<?php
namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::with('airline', 'route')->get();

        foreach ($flights as $flight) {
            $flight->available_seats = $flight->getAvailableSeats();
        }
        
        return view('flights.index', compact('flights'));
    }
}