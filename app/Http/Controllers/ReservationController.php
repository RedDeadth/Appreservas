<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ReservationController extends Controller
{
    public function create(Flight $flight)
    {
        return view('reservations.create', compact('flight'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'seat_number' => 'required|string',
            'status' => 'required|in:confirmed,pending,canceled',
        ]);

        $reservation = Reservation::create([
            'user_id' => Auth::id(),
            'flight_id' => $request->flight_id,
            'seat_number' => $request->seat_number,
            'status' => $request->status,
        ]);

        if ($reservation) {
            session()->flash('success', 'Reserva realizada correctamente');
            return redirect()->route('flights.index');
        } else {
            session()->flash('error', 'Ocurrió algún problema');
            return redirect()->back();
        }
    }
}