<?php

namespace App\Http\Controllers;

use App\Models\AnimeModels;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AnimeController extends Controller
{
    public function showAll(Request $request,$category)
    {
        $limit = 18; 
        $page = $request->query('page', 1); 

        $animeData = AnimeModels::fetchAnimeByCategory($category, $limit, $page);

        return view('animlist', [
            'category' => $category,
            'animeData' => $animeData,
        ]);
    }

    public function details($id)
    {
        $anime = AnimeModels::fetchAnimeById($id);

        return view('anime-details', ['anime' => $anime['Media']]);
    }
}
