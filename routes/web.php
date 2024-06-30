<?php

use App\Http\Controllers\AirlineController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/search', [SearchController::class, 'search'])->name('search.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/reservations/create/{flight}', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/reservations/{id}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::put('/reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');
    Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
    Route::get('/reservations/Myindex', [ReservationController::class, 'Myreservations'])->name('Myreservations.index');

    Route::get('/payment-methods', [PaymentMethodController::class, 'index'])->name('payment-methods.index');
    Route::get('/payment-methods/create', [PaymentMethodController::class, 'create'])->name('payment-methods.create');
    Route::post('/payment-methods', [PaymentMethodController::class, 'store'])->name('payment-methods.store');
    Route::delete('/payment-methods/{id}', [PaymentMethodController::class, 'destroy'])->name('payment-methods.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin/dashboard');

    Route::get('/admin/search', [\App\Http\Controllers\AdminSearchController::class, 'search'])->name('admin.search.index')->middleware(['admin']);

    Route::get('admin/flights/create', [FlightController::class, 'create'])->name('admin.flights.create');   // Formulario para crear vuelo
    Route::post('admin/flights', [FlightController::class, 'store'])->name('admin.flights.store');      // Guardar vuelo
    Route::get('admin/flights/{flight}/edit', [FlightController::class, 'edit'])->name('admin.flights.edit');    // Formulario para editar vuelo
    Route::put('admin/flights/{flight}', [FlightController::class, 'update'])->name('admin.flights.update');  // Actualizar vuelo
    Route::delete('admin/flights/{flight}', [FlightController::class, 'destroy'])->name('admin.flights.destroy');

    Route::get('admin/routes/create', [RouteController::class, 'create'])->name('admin.routes.create');
    Route::post('admin/routes', [RouteController::class, 'store'])->name('admin.routes.store');
    Route::get('admin/routes/{id}/edit', [RouteController::class, 'edit'])->name('admin.routes.edit');
    Route::put('admin/routes/{id}', [RouteController::class, 'update'])->name('admin.routes.update');
    Route::delete('admin/routes/{id}', [RouteController::class, 'destroy'])->name('admin.routes.destroy');
    
    Route::get('admin/airlines/create', [AirlineController::class, 'create'])->name('admin.airlines.create');
    Route::post('admin/airlines', [AirlineController::class, 'store'])->name('airlines.store');
    Route::get('admin/airlines/{id}/edit', [AirlineController::class, 'edit'])->name('admin.airlines.edit');
    Route::put('admin/airlines/{id}', [AirlineController::class, 'update'])->name('admin.airlines.update');
    Route::delete('admin/airlines/{id}', [AirlineController::class, 'destroy'])->name('admin.airlines.destroy');

    Route::get('admin/offers', [OfferController::class, 'index'])->name('admin.offers.index');
    Route::get('admin/offers/create', [OfferController::class, 'create'])->name('admin.offers.create');
    Route::post('admin/offers', [OfferController::class, 'store'])->name('admin.offers.store');
    Route::get('admin/offers/{id}/edit', [OfferController::class, 'edit'])->name('admin.offers.edit');
    Route::put('admin/offers/{id}', [OfferController::class, 'update'])->name('admin.offers.update');
    Route::delete('admin/offers/{id}', [OfferController::class, 'destroy'])->name('admin.offers.destroy');

    Route::get('admin/reservations', [ReservationController::class, 'index'])->name('admin.reservations.index');
});
require __DIR__.'/auth.php';
