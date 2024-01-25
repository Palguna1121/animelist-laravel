<?php

namespace App\Http\Controllers;

use App\Models\SearchModel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'searchTerm' => 'required|string|min:1',
        ]);
    
        $searchTerm = trim($request->input('searchTerm'));
        $limit = 20;
        $page = $request->query('page', $request->segment(3) ?? 1);

        $animeData = SearchModel::searchAnime($searchTerm, $limit, $page);

        return view('search', [
            'searchTerm' => $searchTerm,
            'animeData' => $animeData,
        ]);
    }
}
