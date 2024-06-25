<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Flight;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::with('flight')->get();
        return view('admin.offers.index', compact('offers'));
    }

    public function create()
    {
        $flights = Flight::all();
        return view('admin.offers.create', compact('flights'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'flight_id' => 'required|exists:flights,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        Offer::create($request->all());

        return redirect()->route('admin.offers.index')
            ->with('success', 'Oferta creada correctamente.');
    }

    public function show($id)
    {
        $offer = Offer::with('flight')->findOrFail($id);
        return view('admin.offers.show', compact('offer'));
    }

    public function edit($id)
    {
        $offer = Offer::findOrFail($id);
        $flights = Flight::all();
        return view('admin.offers.edit', compact('offer', 'flights'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'flight_id' => 'required|exists:flights,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $offer = Offer::findOrFail($id);
        $offer->update($request->all());

        return redirect()->route('admin.offers.index')
            ->with('success', 'Oferta actualizada correctamente.');
    }

    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();

        return redirect()->route('admin.offers.index')
            ->with('success', 'Oferta eliminada correctamente.');
    }
}
