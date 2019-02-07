<?php

namespace App\Geocoder;

use App\Entity\City;
use App\Repository\CityRepository;
use Symfony\Contracts\Cache\CacheInterface;

class DatabaseGeocoder implements GeocoderInterface
{
    private $cache;
    private $repository;

    public function __construct(CacheInterface $cache, CityRepository $repository)
    {
        $this->cache = $cache;
        $this->repository = $repository;
    }

    public function findCities(string $country, string $zipCode): array
    {
        $country = strtoupper($country);

        return $this->cache->get('geocode-cities-'.$country.'-'.$zipCode, function () use ($country, $zipCode) {
            return $this->repository->findByZipCode($country, $zipCode);
        });
    }

    public function findCity(int $cityId): ?City
    {
        return $this->repository->find($cityId);
    }
}
