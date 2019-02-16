<?php

namespace App\Geography\Distance;

use App\Geography\Model\Coordinates;
use App\Geography\Model\Distance;
use Geokit\Math;

class DistanceCalculator implements DistanceCalculatorInterface
{
    public function getDistanceBetween(Coordinates $c1, Coordinates $c2): Distance
    {
        return new Distance(
            (new Math())->distanceVincenty($c1, $c2)->meters(),
            ($c1->isHighAccuracy() && $c2->isHighAccuracy()) ? 'high' : 'low'
        );
    }
}
