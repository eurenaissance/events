<?php

namespace App\Geocoder;

interface CalculatorInterface
{
    /**
     * Returns the distance (in kilometers) between two geocodable objects.
     */
    public function getDistanceBetween(GeocodableInterface $geocodable1, GeocodableInterface $geocodable2): float;
}
