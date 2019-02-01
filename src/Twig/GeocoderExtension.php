<?php

namespace App\Twig;

use App\Geocoder\CalculatorInterface;
use App\Geocoder\GeocodableInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class GeocoderExtension extends AbstractExtension
{
    private $calculator;

    public function __construct(CalculatorInterface $calculator)
    {
        $this->calculator = $calculator;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('distance_between', [$this, 'getDistanceBetween']),
        ];
    }

    public function getDistanceBetween(GeocodableInterface $geocodable1, GeocodableInterface $geocodable2): int
    {
        return (int) round($this->calculator->getDistanceBetween($geocodable1, $geocodable2));
    }
}
