<?php

namespace App\DataFixtures;

use App\Entity\Group;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;

class GroupFixtures extends Fixture implements DependentFixtureInterface
{
    public const GROUP_01_UUID = '64246cf5-9b63-4e3c-949f-50d276c2c9d2';
    public const GROUP_02_UUID = 'd72da7d1-92bb-4be5-9e0e-83aa2a5dd335';
    public const GROUP_03_UUID = 'c91893b8-cfbb-4000-838e-7faa46cb20d9';

    public function load(ObjectManager $manager)
    {
        $group1 = $this->create([
            'uuid' => self::GROUP_01_UUID,
            'name' => 'Rémi\'s refused group',
            'animator' => 'actor-1',
            'address' => '456 random street',
            'city' => 'city-2',
            'refused' => true,
        ]);
        $group1->refuse();

        $group2 = $this->create([
            'uuid' => self::GROUP_02_UUID,
            'name' => 'Rémi\'s pending group',
            'animator' => 'actor-1',
            'address' => '789 random street',
            'city' => 'city-2',
        ]);

        $group3 = $this->create([
            'uuid' => self::GROUP_03_UUID,
            'name' => 'Titouan\'s confirmed group',
            'animator' => 'actor-2',
            'address' => '789 random street',
            'city' => 'city-1',
        ]);
        $group3->approve();

        $this->setReference('group-1', $group1);
        $this->setReference('group-2', $group2);
        $this->setReference('group-3', $group3);

        $manager->persist($group1);
        $manager->persist($group2);
        $manager->persist($group3);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ActorFixtures::class,
            CityFixtures::class,
        ];
    }

    private function create(array $data): Group
    {
        $group = new Group(Uuid::fromString($data['uuid']));

        $group->setName($data['name']);
        $group->setAnimator($this->getReference($data['animator']));
        $group->setAddress($data['address']);
        $group->setCity($this->getReference($data['city']));

        return $group;
    }
}
