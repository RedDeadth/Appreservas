<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentMethodController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/reservations/create/{flight}', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/reservations/{id}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::put('/reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');
    Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
    Route::get('/my-flights', [ReservationController::class, 'myReservations'])->name('my-flights.index');

    Route::get('/payment-methods', [PaymentMethodController::class, 'index'])->name('payment-methods.index');
    Route::get('/payment-methods/create', [PaymentMethodController::class, 'create'])->name('payment-methods.create');
    Route::post('/payment-methods', [PaymentMethodController::class, 'store'])->name('payment-methods.store');
    Route::delete('/payment-methods/{id}', [PaymentMethodController::class, 'destroy'])->name('payment-methods.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin/dashboard');
    Route::get('flights', [FlightController::class, 'index'])->name('admin.flights.index');
    Route::get('flights/create', [FlightController::class, 'create'])->name('admin.flights.create');
    Route::post('flights', [FlightController::class, 'store'])->name('admin.flights.store');
    Route::get('flights/{flight}', [FlightController::class, 'show'])->name('admin.flights.show');
    Route::get('flights/{flight}/edit', [FlightController::class, 'edit'])->name('admin.flights.edit');
    Route::put('flights/{flight}', [FlightController::class, 'update'])->name('admin.flights.update');
    Route::delete('flights/{flight}', [FlightController::class, 'destroy'])->name('admin.flights.destroy');
    
});
require __DIR__.'/auth.php';

//Route::get('admin/dashboard', [HomeController::class,'index'])->middleware(['auth', 'admin']);
