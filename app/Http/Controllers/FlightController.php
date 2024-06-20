<?php
namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        // Obtener todos los vuelos
        $flights = Flight::all();
        
        // Pasar los vuelos a la vista
        return view('flights.index', compact('flights'));
    }
}