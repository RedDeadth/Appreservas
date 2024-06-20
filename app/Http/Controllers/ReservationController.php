<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create($flightId)
    {
        // Obtener el vuelo por ID
        $flight = Flight::findOrFail($flightId);
        
        // Pasar el vuelo a la vista de creación de reserva
        return view('reservations.create', compact('flight'));
    }
}