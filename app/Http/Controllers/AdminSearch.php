<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Airline;
use App\Models\Reservation;

class AdminSearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Buscar aerolíneas
        $airlines = Airline::where('name', 'like', '%' . $query . '%')->get();

        // Buscar reservas
        $reservations = Reservation::where('some_field', 'like', '%' . $query . '%')->get();

        return view('admin_search_results', compact('destinations', 'airlines', 'reservations', 'query'));
    }
}
