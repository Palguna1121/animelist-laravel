<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;

class AnimeModels extends Model
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
    
    public static function fetchAnimeById($id)
    {
        $query = <<<GRAPHQL
        query(\$id: Int) {
            Media(idMal: \$id, type: ANIME){
                idMal
                title {
                    romaji
                    english
                    native
                    userPreferred
                }
                type
                status
                popularity
                type
                meanScore
                favourites
                genres
                format
                description
                startDate {
                    year
                    month
                    day
                }
                endDate {
                    year
                    month
                    day
                }
                averageScore
                bannerImage
                coverImage {
                    extraLarge
                    large
                }
                reviews{
                    nodes{
                        user{
                            name
                            avatar{
                                large
                                medium
                            }
                        }
                        rating
                        ratingAmount
                        body
                    }
                }
                duration
                studios {
                    nodes {
                        name
                    }
                }
            }
        }
        GRAPHQL;

        return self::sendGraphQLRequest($query, ['id' => $id]);
    }

    public static function fetchAnimeByCategory($category, $limit, $page)
    {
        $sortField = 'POPULARITY'; 
        $sortOrder = 'DESC'; 

        switch ($category) {
            case 'trending':
                $sortField = 'TRENDING';
                break;
            case 'popular':
                $sortField = 'POPULARITY';
                break;
            case 'favorites':
                $sortField = 'FAVOURITES';
                break;
            case 'top100':
                $sortField = 'SCORE';
                break;
        }

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
                    media(sort: {$sortField}_{$sortOrder}, type: ANIME) {
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

        return self::sendGraphQLRequest($query, ['perPage' => $limit, 'page' => $page]);
    }
}
