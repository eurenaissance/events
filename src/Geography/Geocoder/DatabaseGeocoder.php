<?php

namespace App\Geography\Geocoder;

use App\Entity\City;
use App\Geography\Model\Coordinates;

class DatabaseGeocoder implements GeocoderInterface
{
    public function geocode(string $address, City $city): ?Coordinates
    {
        $cityCoords = $city->getCoordinates();

        return new Coordinates($cityCoords->getLatitude(), $cityCoords->getLongitude(), 'low');
    }
}
