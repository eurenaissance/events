<?php

namespace App\Entity\Util;

use CrEOF\Spatial\PHP\Types\Geometry\Point;

interface EntityGeocodableInterface
{
    public function getCoordinates(): ?Point;
}
