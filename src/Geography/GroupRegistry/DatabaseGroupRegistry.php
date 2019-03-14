<?php

namespace App\Geography\GroupRegistry;

use App\Entity\Actor;
use App\Entity\City;
use App\Repository\GroupRepository;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class DatabaseGroupRegistry implements GroupRegistryInterface
{
    private const CACHE_TTL = 3600 * 24; // 1 day

    private $cache;
    private $repository;

    public function __construct(CacheInterface $cache, GroupRepository $repository)
    {
        $this->cache = $cache;
        $this->repository = $repository;
    }

    public function findGroups(Actor $user, string $term): array
    {
        $country = strtoupper($user->getCountry());
        $zipCode = City::canonicalizeZipCode($user->getZipCode());

        return $this->cache->get('geocode-groups-'.$country.'-'.$zipCode.'-'.$term, function (ItemInterface $item) use ($user, $term) {
            $item->expiresAfter(self::CACHE_TTL);

            return $this->repository->search($user, $term);
        });
    }
}
