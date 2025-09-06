<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingpage');
})->name('home');

// Contoh penggunaan middleware admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-only', function () {
        return 'Only admin can access this';
    });
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Booking routes
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::get('/booking/{field}', [BookingController::class, 'show'])->name('booking.show');
    Route::get('/booking/{field}/schedules', [BookingController::class, 'getSchedules'])->name('booking.schedules');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    
    // Payment routes
    Route::post('/booking/{booking}/pay-remaining', [PaymentController::class, 'payRemaining'])->name('booking.pay-remaining');
});

// Payment callback routes (no auth needed)
Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/pending', [PaymentController::class, 'pending'])->name('payment.pending');
Route::get('/payment/error', [PaymentController::class, 'error'])->name('payment.error');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';