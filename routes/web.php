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

});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin/dashboard');
    Route::get('/admin/notifications', [NotificationController::class, 'index'])->name('admin/notifications');
    Route::get('/admin/notifications/create', [NotificationController::class,'create'])->name('admin/notifications/create');
    Route::post('/admin/notifications/save', [NotificationController::class,'save'])->name('admin/notifications/save');
    Route::get('/admin/notifications/edit/{id}', [NotificationController::class, 'edit'])->name('admin/notifications/edit');
    Route::put('/admin/notifications/edit/{id}', [NotificationController::class, 'update'])->name('admin/notifications/update');
    Route::get('/admin/notifications/delete/{id}', [NotificationController::class, 'delete'])->name('admin/notifications/delete');
});
require __DIR__.'/auth.php';

//Route::get('admin/dashboard', [HomeController::class,'index'])->middleware(['auth', 'admin']);
