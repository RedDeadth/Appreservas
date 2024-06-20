<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReservationController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/flights/index', [FlightController::class, 'index'])->name('flights.index');
    Route::get('/flights', [FlightController::class, 'index'])->name('flights.index');
    Route::get('/reservations/create/{flight}', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
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
