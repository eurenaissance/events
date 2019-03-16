<?php

namespace App\Geography\CityRegistry;

use App\Entity\City;
use App\Repository\CityRepository;

class DatabaseCityRegistry implements CityRegistryInterface
{
    private $repository;

    public function __construct(CityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function findCities(string $country, string $zipCode): array
    {
        $country = strtoupper($country);
        $zipCode = City::canonicalizeZipCode($zipCode);

        return $this->repository->findByZipCode($country, $zipCode);
    }
}
