<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Models\Airline;
use App\Models\Route;
class HomeController extends Controller
{
    public function index()
    {
        $flights = Flight::with('airline', 'route')->get();
        return view('admin/dashboard', compact('flights'));
    }

    public function create()
    {
        return view('admin.flights.create');
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
