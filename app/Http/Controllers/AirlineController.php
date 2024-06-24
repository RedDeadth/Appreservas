<?php
namespace App\Http\Controllers;

use App\Models\Airline;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
    public function index()
    {
        $airlines = Airline::all();
        return view('admin.airline.index', compact('airlines'));
    }

    public function create()
    {
        return view('admin.airline.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Airline::create($request->all());

        return redirect()->route('admin.airlines.index')
            ->with('success', 'Aerolínea creada correctamente.');
    }

    public function edit(Airline $airline)
    {
        return view('admin.airline.edit', compact('airline'));
    }

    public function update(Request $request, Airline $airline)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $airline->update($request->all());

        return redirect()->route('admin.airlines.index')
            ->with('success', 'Aerolínea actualizada correctamente.');
    }

    public function destroy(Airline $airline)
    {
        $airline->delete();

        return redirect()->route('admin.airlines.index')
            ->with('success', 'Aerolínea eliminada correctamente.');
    }
}
