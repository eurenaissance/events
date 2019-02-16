<?php

namespace App\Twig;

use App\Geography\Distance\DistanceCalculatorInterface;
use App\Geography\GeographyInterface;
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

    public function getDistanceBetween(GeographyInterface $geocodable1, GeographyInterface $geocodable2): int
    {
        return (int) round($this->calculator->getDistanceBetween($geocodable1, $geocodable2));
    }
}
