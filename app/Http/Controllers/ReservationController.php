<?php

// app/Http/Controllers/ReservationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Reservation;
use Auth;

class ReservationController extends Controller
{
    public function create($flight_id)
    {
        $flight = Flight::findOrFail($flight_id);
        $occupiedSeats = $flight->getOccupiedSeats();
        $availableSeats = range(1, $flight->available_seats);
        $availableSeats = array_diff($availableSeats, $occupiedSeats);
        $paymentMethods = Auth::user()->paymentMethods;

        return view('reservations.create', compact('flight', 'availableSeats', 'paymentMethods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'seat_number' => 'required|integer',
            'status' => 'required|in:pending,confirmed,canceled',
            'payment_method_id' => 'nullable|exists:payment_methods,id',
        ]);

        $flight = Flight::findOrFail($request->flight_id);
        if (in_array($request->seat_number, $flight->getOccupiedSeats())) {
            return back()->withErrors(['seat_number' => 'El asiento seleccionado ya está ocupado.'])->withInput();
        }
        if ($request->status == 'confirmed' && !$request->payment_method_id) {
            return back()->withErrors(['payment_method_id' => 'Debe seleccionar un método de pago para confirmar la reserva.'])->withInput();
        }

        Reservation::create([
            'user_id' => auth()->id(),
            'flight_id' => $request->flight_id,
            'seat_number' => $request->seat_number,
            'status' => $request->status,
            'payment_method_id' => $request->payment_method_id,
        ]);

        session()->flash('success', 'Reserva creada con éxito');
        return redirect()->route('dashboard');
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
            
        ]);

        $reservation = Reservation::findOrFail($id);
        $flight = $reservation->flight;

        if (in_array($request->seat_number, $flight->getOccupiedSeats())) {
            return back()->withErrors(['seat_number' => 'El asiento seleccionado ya está ocupado.'])->withInput();
        }

        $reservation->update([
            'seat_number' => $request->seat_number,
          
        ]);

        session()->flash('success', 'Reserva actualizada con éxito');
        return redirect()->route('Myreservations.index');
    }

    // Método para eliminar una reserva
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        session()->flash('success', 'Reserva eliminada con éxito');
        return redirect()->route('Myreservations.index');
    }

    public function Myreservations()
    {
        $reservations = auth()->user()->reservations()->with('flight.route', 'flight.airline')->get();
        return view('reservations.Myindex', compact('reservations'));
    }
}
