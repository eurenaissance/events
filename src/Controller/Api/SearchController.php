<?php

namespace App\Controller\Api;

use App\Repository\CityRepository;
use App\Repository\EventRepository;
use App\Repository\GroupRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
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
        $term = $request->query->get('q', '');
        if (strlen($term) < 3) {
            throw new BadRequestHttpException();
        }

        return $this->json($repo->search($term, $appCountry), 200, [], ['groups' => 'city_autocomplete']);
    }

    /**
     * @Route("/events", methods="GET", name="app_api_search_events")
     */
    public function events(CityRepository $cityRepo, EventRepository $eventRepo, Request $request): JsonResponse
    {
        if (!$city = $cityRepo->findOneByUuid($request->query->get('c'))) {
            throw new BadRequestHttpException();
        }

        return $this->json($eventRepo->search($city, $request->query->get('q', '')), 200, [], ['groups' => 'search']);
    }

    /**
     * @Route("/groups", methods="GET", name="app_api_search_groups")
     */
    public function groups(GroupRepository $repo, Request $request): JsonResponse
    {
        $term = $request->query->get('q', '');
        if (strlen($term) < 3) {
            throw new BadRequestHttpException();
        }

        return $this->json($repo->search($this->getUser(), $term), 200, [], ['groups' => 'group_autocomplete']);
    }
}
