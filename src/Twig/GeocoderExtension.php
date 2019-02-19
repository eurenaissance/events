<?php

namespace App\Twig;

use App\Geography\Distance\DistanceCalculatorInterface;
use App\Geography\GeographyInterface;
use App\Geography\Model\Distance;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class GeocoderExtension extends AbstractExtension
{
    private $calculator;

    public function __construct(DistanceCalculatorInterface $calculator)
    {
        $this->calculator = $calculator;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('distance_between', [$this, 'getDistanceBetween']),
        ];
    }

    public function getDistanceBetween(GeographyInterface $g1, GeographyInterface $g2): Distance
    {
        return $this->calculator->getDistanceBetween($g1->getCoordinates(), $g2->getCoordinates());
    }
}
