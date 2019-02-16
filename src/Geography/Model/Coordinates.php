<?php

namespace App\Geography\Model;

use CrEOF\Spatial\PHP\Types\Geometry\Point;

class Coordinates extends Point
{
    use AccuracyTrait;

    public function __construct(float $lon, float $lat, string $accuracy)
    {
        parent::__construct($lon, $lat);

        $this->setAccuracy($accuracy);
    }
}
