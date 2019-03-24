<?php

namespace App\Tests\Geography\CityRegistry;

use App\Entity\City;
use App\Geography\CityRegistry\DatabaseCityRegistry;
use App\Repository\CityRepository;
use App\Tests\UnitTestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * @group unit
 */
class DatabaseCityRegistryTest extends UnitTestCase
{
    /**
     * @var CityRepository|MockObject
     */
    private $repository;

    /**
     * @var DatabaseCityRegistry
     */
    private $registry;

    protected function setUp()
    {
        $this->repository = $this->createMock(CityRepository::class);
        $this->registry = new DatabaseCityRegistry($this->repository);
    }

    public function testFindCities()
    {
        // Mock the repository method
        $city = $this->createMock(City::class);
        $city->method('getName')->willReturn('Clichy');

        $this->repository->expects($this->once())
            ->method('findByZipCode')
            ->with('FR', '92110')
            ->willReturn([$city]);

        // Fetch the cities
        $cities = $this->registry->findCities('fr', '92 110');
        $this->assertCount(1, $cities);
        $this->assertSame($city->getName(), $cities[0]->getName());
    }
}
