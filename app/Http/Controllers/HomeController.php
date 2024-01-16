<?php

namespace App\Http\Controllers;

use App\Models\HomeModels;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $trending = HomeModels::fetchTrendingAnime(10, $page);
        $popular = HomeModels::fetchPopularAnime(6, $page);
        $fav = HomeModels::fetchFavAnime(6, $page);
        $top100 = HomeModels::fetchTop100Anime(5, $page);
        $nullbg = env('NULL_BG');

        return view('home', [
            'trending' => $trending,
            'popular' => $popular,
            'fav' => $fav,
            'top100' => $top100,
            'nullbg' => $nullbg,
        ]);
    }

   
}