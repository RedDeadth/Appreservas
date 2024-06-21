<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Reservation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener todos los vuelos con relaciones cargadas
        $flights = Flight::with('airline', 'route')->get();

        // Iterar sobre cada vuelo para calcular los asientos disponibles
        $flights->each(function ($flight) {
            // Contar la cantidad de reservas confirmadas para este vuelo
            $confirmedReservationsCount = Reservation::where('flight_id', $flight->id)
                ->where('status', 'confirmed')
                ->count();

            // Contar la cantidad de asientos reservados (confirmados y pendientes)
            $totalReservationsCount = Reservation::where('flight_id', $flight->id)
                ->whereIn('status', ['confirmed', 'pending'])
                ->count();

            // Calcular los asientos disponibles restando las reservas confirmadas y pendientes
            $availableSeats = $flight->available_seats - $totalReservationsCount;

            // Actualizar el atributo calculado a cada vuelo
            $flight->available_seats = max(0, $availableSeats); // Evitar asientos negativos
        });

        return view('dashboard', compact('flights'));
    }
}
