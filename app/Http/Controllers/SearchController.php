<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\BinaryTree;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        
        $results = DB::select('CALL searchFlightsAndAirlines(?)', [$searchTerm]);

        $tree = new BinaryTree();
        foreach ($results as $result) {
            $tree->insert((array)$result);
        }

        $sortedResults = [];
        $tree->inOrderTraversal($tree->root, $sortedResults);

        return view('search.results', compact('sortedResults'));
    }
}
