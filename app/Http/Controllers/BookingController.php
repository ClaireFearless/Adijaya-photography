<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    // Halaman utama (landing page)
    public function index()
    {
        $packages = Package::where('is_active', true)->get();
        return view('home', compact('packages'));
    }

    // Halaman form booking
    public function create(Request $request)
    {
        $packages = Package::where('is_active', true)->get();
        $selectedPackage = null;

        if ($request->filled('package_id')) {
            $selectedPackage = Package::find($request->package_id);
        }

        return view('booking.create', compact('packages', 'selectedPackage'));
    }

    // Proses simpan booking
    public function store(Request $request)
    {
        $request->validate([
            'package_id'    => 'required|exists:packages,id',
            'customer_name' => 'required|string|max:255',
            'customer_email'=> 'required|email',
            'customer_wa'   => 'required|string|max:20',
            'booking_date'  => 'required|date|after:today',
            'start_time'    => 'required',
            'end_time'      => 'required|after:start_time',
            'location'      => 'nullable|string|max:255',
            'notes'         => 'nullable|string',
        ]);

        // Cek apakah jadwal bentrok
        $conflict = Booking::where('booking_date', $request->booking_date)
            ->where('status', '!=', 'canceled')
            ->where(function($query) use ($request) {
                $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                      ->orWhereBetween('end_time', [$request->start_time, $request->end_time]);
            })->exists();

        if ($conflict) {
            return back()
                ->withInput()
                ->withErrors(['booking_date' => 'Jadwal tersebut sudah dipesan, silakan pilih waktu lain.']);
        }

        $package = Package::findOrFail($request->package_id);

        // Buat booking baru
        $booking = Booking::create([
            'booking_code'   => 'ADJ-' . strtoupper(Str::random(8)),
            'package_id'     => $package->id,
            'customer_name'  => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_wa'    => $request->customer_wa,
            'booking_date'   => $request->booking_date,
            'start_time'     => $request->start_time,
            'end_time'       => $request->end_time,
            'location'       => $request->location,
            'notes'          => $request->notes,
            'total_price'    => $package->price,
            'dp_amount'      => $package->dp_amount,
            'status'         => 'pending',
        ]);

        // Redirect ke halaman pembayaran
        return redirect()->route('booking.payment', $booking->booking_code);
    }

    // Halaman pilih pembayaran (DP / Lunas)
    public function payment($booking_code)
    {
        $booking = Booking::where('booking_code', $booking_code)
                    ->with('package')
                    ->firstOrFail();

        // Kalau udah dibayar, redirect ke success
        if (in_array($booking->status, ['dp_paid', 'paid', 'completed'])) {
            return redirect()->route('booking.success', $booking->booking_code);
        }

        return view('booking.payment', compact('booking'));
    }

    // Halaman sukses setelah bayar
    public function success($booking_code)
    {
        $booking = Booking::where('booking_code', $booking_code)
                    ->with('package', 'payments')
                    ->firstOrFail();

        return view('booking.success', compact('booking'));
    }

    // Cek status booking
    public function check()
    {
        return view('booking.check');
    }

    public function checkStatus(Request $request)
    {
        $request->validate([
            'booking_code' => 'required|string',
        ]);

        $booking = Booking::where('booking_code', $request->booking_code)
                    ->with('package', 'payments')
                    ->first();

        if (!$booking) {
            return back()->withErrors(['booking_code' => 'Kode booking tidak ditemukan.']);
        }

        return view('booking.check', compact('booking'));
    }
}