<?php

namespace App\Tests\Repository;

use App\Entity\City;
use App\Repository\CityRepository;
use App\Tests\RepositoryTestCase;

/**
 * @group functional
 */
class CityRepositoryTest extends RepositoryTestCase
{
    public function provideZipCodes()
    {
        yield [
            'country' => 'FR',
            'zipCode' => '75000',
            'expected' => [
                ['Paris', 48.8534, 2.3488],
            ],
        ];

        yield [
            'country' => 'FR',
            'zipCode' => '75 000',
            'expected' => [
                ['Paris', 48.8534, 2.3488],
            ],
        ];

        yield [
            'country' => 'FR',
            'zipCode' => '35420',
            'expected' => [
                ['Louvigné-du-Désert', 48.4805, -1.1254],
                ['Saint-Georges-de-Reintembault', 48.5074, -1.2433],
                ['Villamée', 48.4602, -1.219],
            ],
        ];

        yield [
            'country' => 'IE',
            'zipCode' => 'D08VN56',
            'expected' => [
                ['Dublin 8', 53.3346, -6.2733],
            ],
        ];

        yield [
            'country' => 'IE',
            'zipCode' => 'd08vn56',
            'expected' => [
                ['Dublin 8', 53.3346, -6.2733],
            ],
        ];

        yield [
            'country' => 'IE',
            'zipCode' => 'D08 VN56',
            'expected' => [
                ['Dublin 8', 53.3346, -6.2733],
            ],
        ];
    }

    /**
     * @dataProvider provideZipCodes
     */
    public function testFindByZipCode($country, $zipCode, $expected)
    {
        /** @var CityRepository $repository */
        $repository = $this->manager->getRepository(City::class);

        $cities = $repository->findByZipCode($country, $zipCode);

        $actual = [];
        foreach ($cities as $city) {
            $actual[] = [$city->getName(), $city->getLatitude(), $city->getLongitude()];
        }

        $this->assertSame($expected, $actual);
    }
}
