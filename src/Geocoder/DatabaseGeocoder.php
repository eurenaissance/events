<?php

namespace App\Geocoder;

use App\Entity\City;
use App\Repository\CityRepository;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

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

        return $this->cache->get('geocode-cities-'.$country.'-'.$zipCode, function (ItemInterface $item) use ($country, $zipCode) {
            $item->expiresAfter(3600 * 24 * 30); // 1 month

            return $this->repository->findByZipCode($country, $zipCode);
        });
    }

    public function findCity(int $cityId): ?City
    {
        return $this->repository->find($cityId);
    }
}
