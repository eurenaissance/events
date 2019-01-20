<?php

namespace App\DataFixtures;

use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;

class CityFixtures extends Fixture
{
    public const CITY_01_UUID = 'e8b15645-8df6-4d15-8555-94922199e8bd';
    public const CITY_02_UUID = '83cd3d14-fc47-4436-b382-cbb0df910a43';
    public const CITY_03_UUID = '3a3a1a1c-f110-4d42-bbf1-ad6a2ebf096f';
    public const CITY_04_UUID = '5b017472-e001-41f3-8b0e-f77c140b26ed';
    public const CITY_05_UUID = 'c79b2dd0-6380-467b-8b26-8cb0443a84cb';
    public const CITY_06_UUID = '61a309b5-6285-4439-8dc5-aa9b78574622';

    public function load(ObjectManager $manager)
    {
        // Simple case
        $city1 = $this->create(self::CITY_01_UUID, 'FR', 'Paris', '75000', 48.8534, 2.3488);
        $city2 = $this->create(self::CITY_02_UUID, 'FR', 'Bois-Colombes', '92270', 48.9194, 2.2748);

        // Multiple cities for a single ZIP code
        $city3 = $this->create(self::CITY_03_UUID, 'FR', 'Villamée', '35420', 48.4602, -1.219);
        $city4 = $this->create(self::CITY_04_UUID, 'FR', 'Saint-Georges-de-Reintembault', '35420', 48.5074, -1.2433);
        $city5 = $this->create(self::CITY_05_UUID, 'FR', 'Louvigné-du-Désert', '35420', 48.4805, -1.1254);

        // Ireland ZIP codes are only the beginning of the actual ZIP code
        $city6 = $this->create(self::CITY_06_UUID, 'IE', 'Dublin 8', 'D08', 53.3346, -6.2733);

        $this->setReference('city-1', $city1);
        $this->setReference('city-2', $city2);
        $this->setReference('city-3', $city3);
        $this->setReference('city-4', $city4);
        $this->setReference('city-5', $city5);
        $this->setReference('city-6', $city6);

        $manager->persist($city1);
        $manager->persist($city2);
        $manager->persist($city3);
        $manager->persist($city4);
        $manager->persist($city5);
        $manager->persist($city6);

        $manager->flush();
    }

    private function create(
        string $uuid,
        string $country,
        string $name,
        string $zipCode,
        float $latitude,
        float $longitude
    ): City {
        return new City(Uuid::fromString($uuid), $country, $name, $zipCode, $latitude, $longitude);
    }
}
