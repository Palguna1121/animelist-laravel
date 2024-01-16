<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class HomeModels extends Model
{
    private static function sendGraphQLRequest($query, $variables = [])
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

    public static function fetchTrendingAnime($limit, $page)
    {
        $query = 'query($perPage: Int, $page: Int) {
            Page(page: $page, perPage: $perPage) {
                pageInfo {
                    total
                    perPage
                    currentPage
                    lastPage
                    hasNextPage
                }
                media(sort: TRENDING_DESC, type: ANIME) {
                    idMal
                    title {
                        romaji
                        english
                        userPreferred
                    }
                    bannerImage
                    coverImage {
                        medium
                        large
                        extraLarge
                    }
                    description
                    episodes
                    favourites
                    type
                    popularity
                    status
                }
            }
        }';

        return self::sendGraphQLRequest($query,  ['perPage' => $limit, 'page' => $page]);
    }

    public static function fetchPopularAnime($limit, $page)
    {
        $query = <<<GRAPHQL
        query(\$perPage: Int, \$page: Int) {
            Page(page: \$page, perPage: \$perPage) {
                pageInfo {
                    total
                    perPage
                    currentPage
                    lastPage
                    hasNextPage
                }
                media(sort: POPULARITY_DESC, type: ANIME) {
                    idMal
                    title {
                        romaji
                        english
                        userPreferred
                    }
                    bannerImage
                    coverImage {
                        medium
                        large
                        extraLarge
                    }
                    description
                    episodes
                    favourites
                    type
                    popularity
                    status
                }
            }
        }
        GRAPHQL;

        return self::sendGraphQLRequest($query,  ['perPage' => $limit, 'page' => $page]);
    }

    public static function fetchFavAnime($limit, $page)
    {
        $query = <<<GRAPHQL
        query(\$perPage: Int, \$page: Int) {
            Page(page: \$page, perPage: \$perPage) {
                pageInfo {
                    total
                    perPage
                    currentPage
                    lastPage
                    hasNextPage
                }
                media(sort: FAVOURITES_DESC, type: ANIME) {
                    idMal
                    title {
                        romaji
                        english
                        userPreferred
                    }
                    bannerImage
                    coverImage {
                        medium
                        large
                        extraLarge
                    }
                    description
                    episodes
                    favourites
                    type
                    popularity
                    status
                }
            }
        }
        GRAPHQL;

        return self::sendGraphQLRequest($query,  ['perPage' => $limit, 'page' => $page]);
    }

    public static function fetchTop100Anime($limit, $page)
    {
        $query = <<<GRAPHQL
        query(\$perPage: Int, \$page: Int) {
            Page(page: \$page, perPage: \$perPage) {
                pageInfo {
                    total
                    perPage
                    currentPage
                    lastPage
                    hasNextPage
                }
                media(sort: SCORE_DESC, type: ANIME) {
                    idMal
                    title {
                        romaji
                        english
                        userPreferred
                    }
                    bannerImage
                    coverImage {
                        medium
                        large
                        extraLarge
                    }
                    description
                    episodes
                    favourites
                    type
                    popularity
                    status
                }
            }
        }
        GRAPHQL;
        
        return self::sendGraphQLRequest($query,  ['perPage' => $limit, 'page' => $page]);
    }

}


