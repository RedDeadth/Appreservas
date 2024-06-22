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
        return redirect()->route('dashboard');
    }
    public function myReservations()
    {
        $user = auth()->user();
        $reservations = Reservation::where('user_id', $user->id)->with('flight')->get();

        return view('reservations.my_reservations', compact('reservations'));
    }
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $flight = $reservation->flight;
        $availableSeats = range(1, $flight->available_seats);
        $occupiedSeats = $flight->getOccupiedSeats();
        $availableSeats = array_diff($availableSeats, $occupiedSeats);

        return view('reservations.edit', compact('reservation', 'availableSeats'));
    }

    // Método para actualizar una reserva
    public function update(Request $request, $id)
    {
        $request->validate([
            'seat_number' => 'required|integer',
            'status' => 'required|in:pending,confirmed,canceled',
        ]);

        $reservation = Reservation::findOrFail($id);
        $flight = $reservation->flight;

        if (in_array($request->seat_number, $flight->getOccupiedSeats())) {
            return back()->withErrors(['seat_number' => 'El asiento seleccionado ya está ocupado.'])->withInput();
        }

        $reservation->update([
            'seat_number' => $request->seat_number,
            'status' => $request->status,
        ]);

        session()->flash('success', 'Reserva actualizada con éxito');
        return redirect()->route('my-flights.index');
    }

    // Método para eliminar una reserva
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        session()->flash('success', 'Reserva eliminada con éxito');
        return redirect()->route('my-flights.index');
    }

    public function index()
    {
        $reservations = auth()->user()->reservations()->with('flight.route', 'flight.airline')->get();
        return view('my-flights.index', compact('reservations'));
    }
}
