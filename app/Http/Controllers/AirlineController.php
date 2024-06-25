<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use Illuminate\Http\Request;
use App\Models\Flight;

class AirlineController extends Controller
{
    public function index()
    {
        $airlines = Airline::all();
        $flights = Flight::with('airline', 'route')->get();
        return view('admin/dashboard', compact('airlines'));
    }

    public function create()
    {
        $airlines = Airline::all();
        return view('admin.airline.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Airline::create($request->all());

        return redirect()->route('admin/dashboard')
            ->with('success', 'Aerolínea creada correctamente.');
    }

    public function edit($id)
    {
        $airline = Airline::findOrFail($id);
        return view('admin.airline.edit', compact('airline'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $airline = Airline::findOrFail($id);
        $airline->update($request->all());
        $airline->save();

        return redirect()->route('admin/dashboard')
            ->with('success', 'Aerolínea actualizada correctamente.');
    }

    public function destroy($id)
    {
        $airline = Airline::findOrFail($id);
        $airline->delete();

    return redirect()->route('admin/dashboard')
        ->with('success', 'Aerolínea eliminada correctamente.');
    }

}
