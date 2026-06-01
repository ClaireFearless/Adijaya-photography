<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ManageBookingController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ReviewController;


// =====================
// PUBLIC ROUTES (Klien)
// =====================
Route::get('/', [BookingController::class, 'index'])->name('home');
Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/success/{booking_code}', [BookingController::class, 'success'])->name('booking.success');
Route::get('/booking/check', [BookingController::class, 'check'])->name('booking.check');
Route::post('/booking/check', [BookingController::class, 'checkStatus'])->name('booking.checkStatus');
Route::get('/booking/payment/{booking_code}', [BookingController::class, 'payment'])->name('booking.payment');
Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');



// Midtrans Webhook
Route::post('/payment/webhook', [PaymentController::class, 'webhook'])
     ->name('payment.webhook');


     
// =====================
// AUTH ROUTES
// =====================
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');



// =====================
// ADMIN ROUTES (Perlu Login)
// =====================
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Paket Foto
    Route::resource('packages', PackageController::class);

    // Kelola Booking
    Route::get('/bookings', [ManageBookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{booking}', [ManageBookingController::class, 'show'])->name('bookings.show');
    Route::patch('/bookings/{booking}/status', [ManageBookingController::class, 'updateStatus'])->name('bookings.updateStatus');

    // Pembayaran
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');

    // Review
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::patch('/reviews/{review}/toggle', [ReviewController::class, 'toggle'])->name('reviews.toggle');

});