<?php

namespace App\Geography\Geocoder;

use App\Entity\City;
use App\Geography\Model\Coordinates;

interface GeocodableInterface
{
    /**
     * Return the street address of this object.
     *
     * @return string|null
     */
    public function getAddress(): ?string;

    /**
     * Return the city of this object.
     *
     * @return City|null
     */
    public function getCity(): ?City;

    /**
     * Set geocoded coordinates or null if the geocoding failed.
     *
     * @param Coordinates|null $coordinates
     *
     * @return void
     */
    public function setCoordinates(?Coordinates $coordinates);
}
