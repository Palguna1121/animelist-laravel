<?php

use GuzzleHttp\Client;

if (!function_exists('sendGraphQLRequest')) {
    function sendGraphQLRequest($query, $variables = [])
    {
        $http = new Client;
        $response = $http->post(env('ANIME_URL'), [
            'json' => [
                'query' => $query,
                'variables' => $variables,
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        return $data['data'];
    }
}