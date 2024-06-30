<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::all();
        return view('admin.routes.index', compact('routes'));
    }

    public function create()
    {
        return view('admin.routes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'origin' => 'required|string',
            'destination' => 'required|string',
            // Agrega más validaciones según sea necesario
        ]);

        Route::create($request->all());

        return redirect()->route('admin/dashboard')
            ->with('success', 'Ruta creada correctamente.');
    }

    public function show($id)
    {
        $route = Route::findOrFail($id);
        return view('admin/dashboard', compact('route'));
    }

    public function edit($id)
    {
        $route = Route::findOrFail($id);
        return view('admin.routes.edit', compact('route'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'origin' => 'required|string|max:128',
            'destination' => 'required|string|max;128',
            // Agrega más validaciones según sea necesario
        ]);

        $route = Route::findOrFail($id);
        $route->update($request->all());

        return redirect()->route('admin/dashboard')
            ->with('success', 'Ruta actualizada correctamente.');
    }

    public function destroy($id)
    {
        $route = Route::findOrFail($id);
        $route->delete();

        return redirect()->route('admin/dashboard')
            ->with('success', 'Ruta eliminada correctamente.');
    }
}
