<?php

namespace App\Geocoder;

use Geokit\LatLng;
use Geokit\Math;

class Calculator implements CalculatorInterface
{
    public function getDistanceBetween(GeocodableInterface $geocodable1, GeocodableInterface $geocodable2): float
    {
        return (new Math())
            ->distanceVincenty(
                $this->createPoint($geocodable1),
                $this->createPoint($geocodable2)
            )
            ->kilometers()
        ;
    }

    private function createPoint(GeocodableInterface $geocodable): LatLng
    {
        $coordinates = $geocodable->getCoordinates();

        return new LatLng($coordinates->getLatitude(), $coordinates->getLongitude());
    }
}
