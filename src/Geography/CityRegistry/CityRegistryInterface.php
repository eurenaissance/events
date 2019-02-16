<?php

namespace App\Geography\CityRegistry;

use App\Entity\City;

interface CityRegistryInterface
{
    /**
     * Find the list of cities associated to a given ZIP code in the given country.
     *
     * @param string $country
     * @param string $zipCode
     *
     * @return City[]
     */
    public function findCities(string $country, string $zipCode): array;
}
