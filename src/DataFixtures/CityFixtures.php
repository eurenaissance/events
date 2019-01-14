<?php

namespace App\DataFixtures;

use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $manager->persist(new City('FR', 'Paris', '75000', 48.8534, 2.3488));
        $manager->persist(new City('FR', 'Villamée', '35420', 48.4602, -1.219));
        $manager->persist(new City('FR', 'Saint-Georges-de-Reintembault', '35420', 48.5074, -1.2433));
        $manager->persist(new City('FR', 'Louvigné-du-Désert', '35420', 48.4805, -1.1254));
        $manager->persist(new City('RE', 'Saint-Denis', '97400', -20.8823, 55.4504));
        $manager->flush();
    }
}
