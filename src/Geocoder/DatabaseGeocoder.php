<?php

namespace App\Geocoder;

use App\Entity\City;
use App\Repository\CityRepository;

class DatabaseGeocoder implements GeocoderInterface
{
    private $appCountry;
    private $repository;

    public function __construct(string $appCountry, CityRepository $repository)
    {
        $this->appCountry = $appCountry;
        $this->repository = $repository;
    }

    public function findCities(string $zipCode): array
    {
        return $this->repository->findByZipCode($this->appCountry, $zipCode);
    }

    public function findCity(int $cityId): ?City
    {
        return $this->repository->find($cityId);
    }
}
