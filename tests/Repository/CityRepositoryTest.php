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
    public function provideZipCodes(): iterable
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

        yield [
            'country' => 'LV',
            'zipCode' => 'LV-4561',
            'expected' => [
                ['Ozolsala', 57.062, 27.3037],
            ],
        ];

        yield [
            'country' => 'LV',
            'zipCode' => 'LV4561',
            'expected' => [
                ['Ozolsala', 57.062, 27.3037],
            ],
        ];

        yield [
            'country' => 'LV',
            'zipCode' => 'LV - 4561',
            'expected' => [
                ['Ozolsala', 57.062, 27.3037],
            ],
        ];

        yield [
            'country' => 'LV',
            'zipCode' => 'LV 4561',
            'expected' => [
                ['Ozolsala', 57.062, 27.3037],
            ],
        ];
    }

    /**
     * @dataProvider provideZipCodes
     */
    public function testFindByZipCode(string $country, string $zipCode, array $expected): void
    {
        /** @var CityRepository $repository */
        $repository = $this->manager->getRepository(City::class);

        $cities = $repository->findByZipCode($country, $zipCode);

        $actual = [];
        foreach ($cities as $city) {
            $actual[] = [$city->getName(), $city->getLongitude(), $city->getLatitude()];
        }

        $this->assertSame($expected, $actual);
    }
}
