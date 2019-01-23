<?php

namespace App\Controller\Api;

use App\Repository\CityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/city")
 */
class CityController extends AbstractController
{
    /**
     * @Route(
     *     "/autocomplete/{country}/{zipCode}",
     *     name="app_api_city_autocomplete",
     *     requirements={"country": "[A-Z]{2}", "zipCode": "[\w\s\-]{3,15}"},
     *     methods="GET"
     * )
     */
    public function autocomplete(CityRepository $cityRepository, string $country, string $zipCode): JsonResponse
    {
        $cities = $cityRepository->findByZipCode($country, $zipCode);

        return $this->json($cities, 200, [], ['groups' => 'city_autocomplete']);
    }
}
