<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSearchController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        // Llamada al procedimiento almacenado para obtener las reservas por nombre de usuario
        $results = DB::select('CALL searchFlightsAndAirlinesandUser(?)', [$searchTerm]);

        return view('admin.search.results', compact('results'));
    }
}
