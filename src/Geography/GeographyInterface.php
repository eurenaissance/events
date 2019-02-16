<?php

namespace App\Geography;

use App\Geography\Model\Coordinates;

interface GeographyInterface
{
    public function getCoordinates(): ?Coordinates;
}
