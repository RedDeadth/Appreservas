<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener todos los vuelos con relaciones cargadas
        $flights = Flight::with('airline', 'route', 'offers')->get();

        // Iterar sobre cada vuelo para calcular los asientos disponibles y la duración del vuelo
        $flights->each(function ($flight) {
            // Calcular la duración del vuelo en horas y minutos
            $departureDateTime = new \DateTime($flight->departure_date_time);
            $arrivalDateTime = new \DateTime($flight->arrival_date_time);
            $duration = $departureDateTime->diff($arrivalDateTime);

            // Calcular la duración total en minutos y luego convertirla a horas y minutos
            $totalMinutes = $duration->days * 24 * 60;
            $totalMinutes += $duration->h * 60;
            $totalMinutes += $duration->i;

            $hours = floor($totalMinutes / 60);
            $minutes = $totalMinutes % 60;

            // Formatear la duración del vuelo como HH:MM
            $flight->duration = sprintf('%02d:%02d', $hours, $minutes);

            // Calcular los asientos disponibles
            $availableSeats = $flight->available_seats - $flight->reservations()->whereIn('status', ['confirmed', 'pending'])->count();

            // Actualizar el atributo calculado a cada vuelo
            $flight->available_seats = max(0, $availableSeats); // Evitar asientos negativos
        });

        return view('dashboard', compact('flights'));
    }
}
