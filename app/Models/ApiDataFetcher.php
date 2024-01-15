<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class ApiDataFetcher extends Model
{
    public static function fetchData($resource, $queryParams = [])
    {
        $apiUrl = env('API_URL') . '/' . $resource;

        if (!empty($queryParams)) {
            $apiUrl .= '?' . http_build_query($queryParams);
        }

        $response = Http::withOptions(['verify' => false])->get($apiUrl);

        if ($response->successful()) {
            return json_decode($response, true);
        } else {
            return null;
        }
    }

    public static function getNestedAnimeResponses($resource, $objectProp, $gap)
    {
        $apiUrl = env('API_URL') . '/' . $resource;
        $response = Http::withOptions(['verify' => false])->get($apiUrl);
        $data = $response->json();
        
        $nestedData = collect($data['data'])->flatMap(function ($item) use ($objectProp) {
            return $item[$objectProp];
        });

        $gap = min($gap, $nestedData->count());

        $randomData = $nestedData->shuffle()->take($gap);

        return $randomData;
    
    }

}
