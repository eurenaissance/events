<?php

namespace App\Geography\Distance;

use App\Geography\Model\Coordinates;
use App\Geography\Model\Distance;

interface DistanceCalculatorInterface
{
    public function getDistanceBetween(Coordinates $c1, Coordinates $c2): Distance;
}
