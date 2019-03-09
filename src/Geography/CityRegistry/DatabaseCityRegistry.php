<?php

namespace App\Geography\CityRegistry;

use App\Entity\City;
use App\Repository\CityRepository;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class DatabaseCityRegistry implements CityRegistryInterface
{
    private const CACHE_TTL = 3600 * 24; // 1 day

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
        $zipCode = City::canonicalizeZipCode($zipCode);

        return $this->cache->get('geocode-cities-'.$country.'-'.$zipCode, function (ItemInterface $item) use ($country, $zipCode) {
            $item->expiresAfter(self::CACHE_TTL);

            return $this->repository->findByZipCode($country, $zipCode);
        });
    }
}
