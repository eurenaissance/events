<?php

namespace App\DataFixtures;

use App\Entity\Group;
use App\Util\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;

class GroupFixtures extends Fixture implements DependentFixtureInterface
{
    public const GROUP_01_UUID = '64246cf5-9b63-4e3c-949f-50d276c2c9d2';
    public const GROUP_02_UUID = 'd72da7d1-92bb-4be5-9e0e-83aa2a5dd335';
    public const GROUP_03_UUID = 'c91893b8-cfbb-4000-838e-7faa46cb20d9';
    public const GROUP_04_UUID = '59502dcd-291b-4ebc-8440-29f912be291a';
    public const GROUP_05_UUID = 'cd14a575-f14d-4d2a-a3dd-0e799cf3adbe';
    public const GROUP_06_UUID = '9159df14-4052-4355-aec6-54d4eec67744';
    public const GROUP_07_UUID = 'dfb92581-1b79-452b-9d5d-43c8a5060a97';
    public const GROUP_08_UUID = '9dd181af-58a5-42f4-91d6-1e0b6c6723a5';
    public const GROUP_09_UUID = '7d94e9cf-1f88-4fd4-82a8-6e4a8949f000';
    public const GROUP_10_UUID = 'baa530cc-1ade-4275-9e8c-ba3530507c0e';

    private $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager)
    {
        $group1 = $this->create(
            'group-bois-colombes-refused',
            self::GROUP_01_UUID,
            'Development in Bois-Colombes',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'actor-bois-colombes',
            'city-bois-colombes'
        );
        $group1->refuse();

        $group2 = $this->create(
            'group-clichy-ecology-approved',
            self::GROUP_02_UUID,
            'Ecology in Clichy',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'actor-clichy',
            'city-clichy',
            '789 random street'
        );
        $group2->approve();

        $group3 = $this->create(
            'group-paris-development-refused',
            self::GROUP_03_UUID,
            'Development in Paris',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'actor-paris',
            'city-paris',
            '789 random street'
        );
        $group3->refuse();

        $group4 = $this->create(
            'group-paris-ecology-approved',
            self::GROUP_04_UUID,
            'Ecology in Paris',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'actor-paris',
            'city-paris',
            '123 random street'
        );
        $group4->approve();

        // pending group
        $group5 = $this->create(
            'group-paris-culture-pending',
            self::GROUP_05_UUID,
            'Culture in Paris',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'actor-paris',
            'city-paris',
            '234 random street'
        );

        $group6 = $this->create(
            'group-nice-ecology-approved',
            self::GROUP_06_UUID,
            'Ecology in Nice',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'actor-nice',
            'city-nice',
            '345 random street'
        );
        $group6->approve();

        // approved and then refused
        $group7 = $this->create(
            'group-lille-approved-and-refused',
            self::GROUP_07_UUID,
            'Development in Lille',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'actor-lille',
            'city-lille',
            '345 random street'
        );
        $group7->approve();
        $group7->refuse();

        $group8 = $this->create(
            'group-nantes-approved',
            self::GROUP_08_UUID,
            'Ecology in Nantes',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'actor-nantes',
            'city-nantes',
            '345 random street'
        );
        $group8->approve();

        $group9 = $this->create(
            'group-cannes-approved',
            self::GROUP_09_UUID,
            'Culture in Cannes',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'actor-cannes',
            'city-cannes',
            '345 random street'
        );
        $group9->approve();

        // animator from another city
        $group10 = $this->create(
            'group-asnieres-approved',
            self::GROUP_10_UUID,
            'Culture in Asnieres',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'actor-cannes',
            'city-asnieres',
            '345 random street'
        );
        $group10->approve();

        $manager->persist($group1);
        $manager->persist($group2);
        $manager->persist($group3);
        $manager->persist($group4);
        $manager->persist($group5);
        $manager->persist($group6);
        $manager->persist($group7);
        $manager->persist($group8);
        $manager->persist($group9);
        $manager->persist($group10);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ActorFixtures::class,
            CityFixtures::class,
        ];
    }

    private function create(
        string $reference,
        string $uuid,
        string $name,
        string $description,
        string $animatorReference,
        string $cityReference,
        string $address = null
    ): Group {
        $group = new Group(Uuid::fromString($uuid));

        $group->setName($name);
        $group->setDescription($description);
        $group->setAnimator($this->getReference($animatorReference));
        $group->setCity($this->getReference($cityReference));

        if ($address) {
            $group->setAddress($address);
        }

        $this->slugify->createSlug($group);

        $this->setReference($reference, $group);

        return $group;
    }
}
