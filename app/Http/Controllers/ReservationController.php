<?php

// app/Http/Controllers/ReservationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function create($flight_id)
    {
        $flight = Flight::findOrFail($flight_id);
        $occupiedSeats = $flight->getOccupiedSeats();
        $availableSeats = range(1, $flight->available_seats);
        $availableSeats = array_diff($availableSeats, $occupiedSeats);

        return view('reservations.create', compact('flight', 'availableSeats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'seat_number' => 'required|integer',
            'status' => 'required|in:pending,confirmed,canceled',
        ]);

        $flight = Flight::findOrFail($request->flight_id);
        if (in_array($request->seat_number, $flight->getOccupiedSeats())) {
            return back()->withErrors(['seat_number' => 'El asiento seleccionado ya está ocupado.'])->withInput();
        }

        Reservation::create([
            'user_id' => auth()->id(),
            'flight_id' => $request->flight_id,
            'seat_number' => $request->seat_number,
            'status' => $request->status,
        ]);

        session()->flash('success', 'Reserva creada con éxito');
        return redirect()->route('flights.index');
    }
}
