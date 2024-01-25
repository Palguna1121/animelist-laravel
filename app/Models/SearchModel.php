<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use app\Helpers\GraphQLHelper;

class SearchModel extends Model
{
    public static function searchAnime($searchTerm, $limit, $page)
    {
        $query = <<<GRAPHQL
        query(\$search: String, \$perPage: Int, \$page: Int) {
            Page(page: \$page, perPage: \$perPage) {
                pageInfo {
                    total
                    perPage
                    currentPage
                    lastPage
                    hasNextPage
                }
                media(search: \$search, type: ANIME, sort: POPULARITY_DESC) {
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

        $variables = [
            'search' => $searchTerm,
            'perPage' => $limit,
            'page' => $page
        ];

        $result = sendGraphQLRequest($query, $variables);

        return $result;
    }
}
