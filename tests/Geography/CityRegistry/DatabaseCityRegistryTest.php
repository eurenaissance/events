<?php

namespace App\Tests\Geography\CityRegistry;

use App\Entity\City;
use App\Geography\CityRegistry\DatabaseCityRegistry;
use App\Repository\CityRepository;
use App\Tests\UnitTestCase;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\Cache\Adapter\ArrayAdapter;

/**
 * @group unit
 */
class DatabaseCityRegistryTest extends UnitTestCase
{
    /**
     * @var ArrayAdapter
     */
    private $cache;

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
        $this->cache = new ArrayAdapter();
        $this->repository = $this->createMock(CityRepository::class);
        $this->registry = new DatabaseCityRegistry($this->cache, $this->repository);
    }

    public function testFindCitiesCacheEmpty()
    {
        $this->assertEmpty($this->cache->getValues());

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

        // Check the cache is properly populated
        $this->assertCount(1, $this->cache->getValues());
        $this->assertTrue($this->cache->hasItem('geocode-cities-FR-92110'));

        $cached = $this->cache->getItem('geocode-cities-FR-92110')->get();
        $this->assertCount(1, $cached);
        $this->assertSame($city->getName(), $cached[0]->getName());
    }

    public function testFindCitiesCacheFull()
    {
        // Fill the cache
        $this->assertEmpty($this->cache->getValues());

        $city = $this->createMock(City::class);
        $city->method('getName')->willReturn('Clichy');

        $item = $this->cache->getItem('geocode-cities-FR-92110');
        $item->set([$city]);

        $this->cache->save($item);

        // The repository method should never be called
        $this->repository->expects($this->never())->method('findByZipCode');

        // Fetch the cities
        $cities = $this->registry->findCities('fr', '92 110');
        $this->assertCount(1, $cities);
        $this->assertSame($city->getName(), $cities[0]->getName());

        $this->assertCount(1, $this->cache->getValues());
        $this->assertTrue($this->cache->hasItem('geocode-cities-FR-92110'));

        $cached = $this->cache->getItem('geocode-cities-FR-92110')->get();
        $this->assertCount(1, $cached);
        $this->assertSame($city->getName(), $cached[0]->getName());
    }
}
