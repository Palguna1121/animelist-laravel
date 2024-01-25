<?php

namespace App\Http\Controllers;

use App\Models\HomeModels;
use App\Models\AnimeModels;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AnimeController extends Controller
{
    public function showAll(Request $request,$category)
    {
        $limit = 18; 
        $page = $request->query('page', $request->segment(3) ?? 1);  
        $pageStatic = $request->query('page', 1);  

        $top100 = HomeModels::fetchTop100Anime(5, $pageStatic);
        $trending = HomeModels::fetchTrendingAnime(10, $pageStatic);
        $nullbg = env('NULL_BG');

        $animeData = AnimeModels::fetchAnimeByCategory($category, $limit, $page);

        return view('animlist', [
            'category' => $category,
            'animeData' => $animeData,
            'top100' => $top100,
            'trending' => $trending,
            'nullbg' => $nullbg,
        ]);
    }

    public function details($id)
    {
        $anime = AnimeModels::fetchAnimeById($id);

        $popular = HomeModels::fetchPopularAnime(6,1);

        return view('anime-details', [
            'anime' => $anime['Media'],
            'popular' => $popular,
        ]);
    }

}
