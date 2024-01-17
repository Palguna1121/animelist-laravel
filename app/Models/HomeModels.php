<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use app\Helpers\GraphQLHelper;

class HomeModels extends Model
{
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

        $result = sendGraphQLRequest($query,  ['perPage' => $limit, 'page' => $page]);

        return $result;
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

        $result = sendGraphQLRequest($query,  ['perPage' => $limit, 'page' => $page]);

        return $result;
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

        $result = sendGraphQLRequest($query,  ['perPage' => $limit, 'page' => $page]);

        return $result;
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

        $result = sendGraphQLRequest($query,  ['perPage' => $limit, 'page' => $page]);

        return $result;
    }

}


