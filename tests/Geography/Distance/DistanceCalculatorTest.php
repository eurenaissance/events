<?php

namespace App\Tests\Geography\Distance;

use App\Geography\Distance\DistanceCalculator;
use App\Geography\Model\Coordinates;
use App\Tests\UnitTestCase;

/**
 * @group unit
 */
class DistanceCalculatorTest extends UnitTestCase
{
    public function provideDistances()
    {
        yield [
            'c1' => [
                'lon' => 2.3128795623779297,
                'lat' => 48.90309473234857,
                'accuracy' => 'high',
            ],
            'c2' => [
                'lon' => 2.3079872131347656,
                'lat' => 48.900950746261614,
                'accuracy' => 'high',
            ],
            'distance' => [
                'meters' => 430,
                'kilometers' => 0.4,
                'accuracy' => 'high',
            ],
        ];

        yield [
            'c1' => [
                'lon' => 2.3128795623779297,
                'lat' => 48.90309473234857,
                'accuracy' => 'high',
            ],
            'c2' => [
                'lon' => 2.3079872131347656,
                'lat' => 48.900950746261614,
                'accuracy' => 'low',
            ],
            'distance' => [
                'meters' => 430,
                'kilometers' => 0.4,
                'accuracy' => 'low',
            ],
        ];

        yield [
            'c1' => [
                'lon' => 2.3128795623779297,
                'lat' => 48.90309473234857,
                'accuracy' => 'low',
            ],
            'c2' => [
                'lon' => 2.3079872131347656,
                'lat' => 48.900950746261614,
                'accuracy' => 'low',
            ],
            'distance' => [
                'meters' => 430,
                'kilometers' => 0.4,
                'accuracy' => 'low',
            ],
        ];
    }

    /**
     * @dataProvider provideDistances
     */
    public function testGetDistanceBetween($c1Data, $c2Data, $expectedDistance)
    {
        $c1 = new Coordinates($c1Data['lon'], $c1Data['lat'], $c1Data['accuracy']);
        $c2 = new Coordinates($c2Data['lon'], $c2Data['lat'], $c2Data['accuracy']);

        $distance = (new DistanceCalculator())->getDistanceBetween($c1, $c2);

        $this->assertSame($expectedDistance['meters'], $distance->getMeters());
        $this->assertSame($expectedDistance['kilometers'], $distance->getKilometers());
        $this->assertSame($expectedDistance['accuracy'], $distance->getAccuracy());
    }
}
