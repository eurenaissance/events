<?php

namespace App\Geocoder;

use CrEOF\Spatial\PHP\Types\Geometry\Point;

interface GeocodableInterface
{
    public function getCoordinates(): ?Point;
}
