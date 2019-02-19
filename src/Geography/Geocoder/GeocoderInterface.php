<?php

namespace App\Geography\Geocoder;

use App\Entity\City;
use App\Geography\Model\Coordinates;

interface GeocoderInterface
{
    /**
     * Geocode a given address and return its coordinates, including an accuracy.
     *
     * @param string $address
     * @param City   $city
     *
     * @return Coordinates|null
     */
    public function geocode(string $address, City $city): ?Coordinates;
}
