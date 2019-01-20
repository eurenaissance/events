<?php

namespace App\DataFixtures;

use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Simple case
        $manager->persist($city1 = new City('FR', 'Paris', '75000', 48.8534, 2.3488));

        // Multiple cities for a single ZIP code
        $manager->persist($city2 = new City('FR', 'Villamée', '35420', 48.4602, -1.219));
        $manager->persist($city3 = new City('FR', 'Saint-Georges-de-Reintembault', '35420', 48.5074, -1.2433));
        $manager->persist($city4 = new City('FR', 'Louvigné-du-Désert', '35420', 48.4805, -1.1254));

        // Ireland ZIP codes are only the beginning of the actual ZIP code
        $manager->persist($city5 = new City('IE', 'Dublin 8', 'D08', 53.3346, -6.2733));

        $manager->persist($city6 = new City('FR', 'Bois-Colombes', '92270', 48.9194, 2.2748));

        $this->setReference('city-1', $city1);
        $this->setReference('city-2', $city2);
        $this->setReference('city-3', $city3);
        $this->setReference('city-4', $city4);
        $this->setReference('city-5', $city5);
        $this->setReference('city-6', $city6);

        $manager->flush();
    }
}
