<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Setup Midtrans config
        Config::$serverKey    = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized  = config('midtrans.is_sanitized');
        Config::$is3ds        = config('midtrans.is_3ds');
    }

    // ================================
    // Proses buat Snap Token
    // ================================
    public function process(Request $request)
    {
        $request->validate([
            'booking_code' => 'required|string',
            'payment_type' => 'required|in:dp,full',
        ]);

        $booking = Booking::where('booking_code', $request->booking_code)
                    ->with('package')
                    ->firstOrFail();

        // Kalau udah dibayar, tolak
        if (in_array($booking->status, ['dp_paid', 'paid', 'completed'])) {
            return response()->json([
                'message' => 'Booking ini sudah dibayar.'
            ], 400);
        }

        // Tentukan nominal berdasarkan tipe pembayaran
        $amount = $request->payment_type === 'dp'
                    ? (int) $booking->dp_amount
                    : (int) $booking->total_price;

        // Order ID unik per transaksi
        $orderId = $booking->booking_code . '-' . $request->payment_type . '-' . time();

        // Parameter Midtrans
        $params = [
            'transaction_details' => [
                'order_id'     => $orderId,
                'gross_amount' => $amount,
            ],
            'customer_details' => [
                'first_name' => $booking->customer_name,
                'email'      => $booking->customer_email,
                'phone'      => $booking->customer_wa,
            ],
            'item_details' => [
                [
                    'id'       => $booking->package->id,
                    'price'    => $amount,
                    'quantity' => 1,
                    'name'     => $request->payment_type === 'dp'
                                    ? 'DP - ' . $booking->package->name
                                    : 'Lunas - ' . $booking->package->name,
                ]
            ],
            'callbacks' => [
                'finish' => route('booking.success', $booking->booking_code),
            ]
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            // Simpan snap token ke booking
            $booking->update(['snap_token' => $snapToken]);

            // Buat record payment pending
            Payment::create([
                'booking_id'         => $booking->id,
                'midtrans_order_id'  => $orderId,
                'payment_type'       => $request->payment_type,
                'amount'             => $amount,
                'status'             => 'pending',
            ]);

            return response()->json([
                'snap_token' => $snapToken,
            ]);

        } catch (\Exception $e) {
            Log::error('Midtrans error: ' . $e->getMessage());
            return response()->json([
                'message' => 'Gagal memproses pembayaran. Silakan coba lagi.'
            ], 500);
        }
    }

    // ================================
    // Webhook dari Midtrans
    // ================================
    public function webhook(Request $request)
    {
        try {
            $notif = new Notification();

            $orderId           = $notif->order_id;
            $transactionStatus = $notif->transaction_status;
            $paymentType       = $notif->payment_type;
            $fraudStatus       = $notif->fraud_status;
            $transactionId     = $notif->transaction_id;

            // Cari payment berdasarkan order_id
            $payment = Payment::where('midtrans_order_id', $orderId)->first();

            if (!$payment) {
                Log::warning('Webhook: Payment not found for order_id: ' . $orderId);
                return response()->json(['message' => 'Payment not found'], 404);
            }

            $booking = $payment->booking;

            // Tentukan status berdasarkan notifikasi Midtrans
            if ($transactionStatus === 'capture') {
                $status = $fraudStatus === 'accept' ? 'success' : 'failed';
            } elseif ($transactionStatus === 'settlement') {
                $status = 'success';
            } elseif (in_array($transactionStatus, ['cancel', 'deny', 'expire'])) {
                $status = 'failed';
            } elseif ($transactionStatus === 'pending') {
                $status = 'pending';
            } else {
                $status = 'pending';
            }

            // Update payment
            $payment->update([
                'status'                   => $status,
                'payment_method'           => $paymentType,
                'midtrans_transaction_id'  => $transactionId,
                'paid_at'                  => $status === 'success' ? now() : null,
            ]);

            // Update status booking
            if ($status === 'success') {
                $newBookingStatus = $payment->payment_type === 'full'
                                        ? 'paid'
                                        : 'dp_paid';
                $booking->update(['status' => $newBookingStatus]);
            } elseif ($status === 'failed') {
                // Kalau semua payment gagal, booking kembali pending
                $hasSuccess = $booking->payments()
                                ->where('status', 'success')
                                ->exists();
                if (!$hasSuccess) {
                    $booking->update(['status' => 'pending']);
                }
            }

            return response()->json(['message' => 'OK']);

        } catch (\Exception $e) {
            Log::error('Webhook error: ' . $e->getMessage());
            return response()->json(['message' => 'Error'], 500);
        }
    }
}