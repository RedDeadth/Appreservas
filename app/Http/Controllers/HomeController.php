<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Models\Airline;
use App\Models\Route;
use App\Models\Reservation;

class HomeController extends Controller
{
    public function index()
    {
        $flights = Flight::with('airline', 'route')->get();
        $airlines = Airline::all();

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

            // Contar la cantidad de reservas confirmadas para este vuelo
            $confirmedReservationsCount = Reservation::where('flight_id', $flight->id)
                ->where('status', 'confirmed')
                ->count();

            // Contar la cantidad total de reservas (confirmadas y pendientes)
            $totalReservationsCount = Reservation::where('flight_id', $flight->id)
                ->whereIn('status', ['confirmed', 'pending'])
                ->count();

            // Calcular los asientos disponibles restando las reservas confirmadas y pendientes
            $availableSeats = $flight->available_seats - $totalReservationsCount;

            // Actualizar el atributo calculado a cada vuelo
            $flight->available_seats = max(0, $availableSeats); // Evitar asientos negativos
        });

        return view('admin.dashboard', compact('flights', 'airlines'));
    }

    public function create()
    {
        $airlines = Airline::all();
        $routes = Route::all();
        return view('admin.flight.create', compact('airlines', 'routes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'airline_id' => 'required|exists:airlines,id',
            'route_id' => 'required|exists:routes,id',
            'departure_date_time' => 'required|date',
            'arrival_date_time' => 'required|date|after:departure_date_time',
            'available_seats' => 'required|integer|min:0',
        ]);

        Flight::create($request->all());

        return redirect()->route('admin/dashboard')
            ->with('success', 'Vuelo creado correctamente.');
    }


    public function edit($id)
    {
        $flight = Flight::findOrFail($id);
        $airlines = Airline::all(); // Obtén todas las aerolíneas
        $routes = Route::all();     // Obtén todas las rutas

        return view('admin.flight.edit', compact('flight', 'airlines', 'routes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'airline_id' => 'required|exists:airlines,id',
            'route_id' => 'required|exists:routes,id',
            'departure_date_time' => 'required|date',
            'arrival_date_time' => 'required|date|after:departure_date_time',
            'available_seats' => 'required|integer|min:0',
        ]);

        $flight = Flight::findOrFail($id);
        $flight->update($request->all());

        return redirect()->route('admin/dashboard')
            ->with('success', 'Vuelo actualizado correctamente.');
    }

    public function destroy($id)
    {
        $flight = Flight::findOrFail($id);
        $flight->delete();

        return redirect()->route('admin/dashboard')
            ->with('success', 'Vuelo eliminado correctamente.');
    }
}
