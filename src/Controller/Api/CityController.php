<?php

namespace App\Controller\Api;

use App\Entity\City;
use App\Geography\CityRegistry\CityRegistryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cities")
 */
class CityController extends AbstractController
{
    /**
     * @Route(
     *     "/autocomplete/{country}/{zipCode}",
     *     name="app_api_city_autocomplete",
     *     requirements={"country": "[a-zA-Z]{2}", "zipCode": "[\w\s\-]{1,15}"},
     *     methods="GET"
     * )
     */
    public function autocomplete(CityRegistryInterface $registry, string $country, string $zipCode): JsonResponse
    {
        return $this->json($registry->findCities($country, $zipCode), 200, [], ['groups' => 'city_autocomplete']);
    }

    /**
     * @Route("/{uuid}", name="app_api_city_show", requirements={"uuid": "%pattern_uuid%"}, methods="GET")
     */
    public function show(City $city): JsonResponse
    {
        return $this->json($city, 200, [], ['groups' => 'city_autocomplete']);
    }
}
