<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Package;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            // Statistik Booking
            'total_booking'    => Booking::count(),
            'booking_pending'  => Booking::where('status', 'pending')->count(),
            'booking_dp_paid'  => Booking::where('status', 'dp_paid')->count(),
            'booking_selesai'  => Booking::where('status', 'completed')->count(),

            // Statistik Pendapatan
            'total_pendapatan' => Payment::where('status', 'success')->sum('amount'),

            // Booking Terbaru 
            'booking_terbaru'  => Booking::with('package')
                                    ->latest()
                                    ->take(5)
                                    ->get(),

            // Total Paket Aktif
            'total_paket'      => Package::where('is_active', true)->count(),
        ];

        return view('admin.dashboard', $data);
    }
}