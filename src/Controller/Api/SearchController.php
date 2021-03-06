<?php

namespace App\Controller\Api;

use App\Repository\CityRepository;
use App\Search\SearchEngine;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/search")
 */
class SearchController extends AbstractController
{
    /**
     * @Route("/cities", methods="GET", name="app_api_search_cities")
     */
    public function cities(CityRepository $repo, string $appCountry, Request $request): JsonResponse
    {
        if (strlen($term = $request->query->get('q', '')) < 3) {
            return $this->json([]);
        }

        return $this->json($repo->search($term, $appCountry), 200, [], ['groups' => 'city_autocomplete']);
    }

    /**
     * @Route("/events", methods="GET", name="app_api_search_events")
     */
    public function events(SearchEngine $searchEngine, Request $request): JsonResponse
    {
        return $searchEngine->searchEvent($request);
    }

    /**
     * @Route("/groups", methods="GET", name="app_api_search_groups")
     */
    public function groups(SearchEngine $searchEngine, Request $request): JsonResponse
    {
        return $searchEngine->searchGroup($request);
    }
}
