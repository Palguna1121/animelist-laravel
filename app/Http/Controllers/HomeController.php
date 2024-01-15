<?php

namespace App\Http\Controllers;

use App\Models\ApiDataFetcher;

class HomeController extends Controller
{
    public function index()
    {
        $heroData = ApiDataFetcher::fetchData('top/anime', ['limit' => 5]);
        $seasonNowData = ApiDataFetcher::fetchData('seasons/now', ['limit' => 6]);
        $seasonUpcomingData = ApiDataFetcher::fetchData('seasons/upcoming', ['limit' => 6]);
        $reproducedData = ApiDataFetcher::getNestedAnimeResponses('recommendations/anime', 'entry', 5);

        return view('home', [
            'heroData' => $heroData,
            'seasonNowData' => $seasonNowData,
            'seasonUpcomingData' => $seasonUpcomingData,
            'reproducedData' => $reproducedData,
        ]);
    }

    public function show($id)
    {
        $anime = ApiDataFetcher::fetchData(`anime/$id`);

        return view('anime-details', ['anime' => $anime]);
    }
}