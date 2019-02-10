<?php

namespace App\Geocoder;

use App\Entity\City;

interface GeocoderInterface
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

    /**
     * Find a specific city in the current instance country.
     *
     * @param int $cityId
     *
     * @return City|null
     */
    public function findCity(int $cityId): ?City;
}
