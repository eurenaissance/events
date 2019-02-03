<?php

namespace App\DataFixtures;

use App\Entity\Event;
use App\Util\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;

class EventFixtures extends Fixture implements DependentFixtureInterface
{
    public const EVENT_01_UUID = '690597d3-2697-4b57-b0a2-d2a384d2c532';
    public const EVENT_02_UUID = 'a2581e47-faac-44b2-af30-bb333f73b417';
    public const EVENT_03_UUID = 'fb80eba0-eefa-4b6d-8cc7-936da0464d7f';
    public const EVENT_04_UUID = 'a4c8aa45-1bd7-44cc-9471-2c669ec6ca0a';
    public const EVENT_05_UUID = '55c44df9-2ad8-489f-8702-09b5e01140ec';
    public const EVENT_06_UUID = '637a20db-9c6f-4c6f-ad75-b8ebf7ec1319';
    public const EVENT_07_UUID = '8b8ce6b3-cb2c-44a5-a612-99774d9fae95';
    public const EVENT_08_UUID = '7d9172f8-c991-458d-83b2-b232f3e1d828';
    public const EVENT_09_UUID = 'facc442f-0052-416f-9e57-6df4576f8127';
    public const EVENT_10_UUID = '33d4f54c-db6a-4caa-8893-b94ad9b18c75';

    private $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager)
    {
        $event1 = $this->create(
            'event-bois-colombes-group-paris',
            self::EVENT_01_UUID,
            'Event in Bois-Colombes',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            '-1 day',
            '+1 day',
            'actor-paris',
            'group-paris-ecology-approved',
            'city-bois-colombes'
        );

        $event2 = $this->create(
            'event-clichy-group-paris',
            self::EVENT_02_UUID,
            'Event in Clichy',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            '+3 days',
            '+5 days',
            'actor-paris',
            'group-paris-ecology-approved',
            'city-clichy',
            '789 random street'
        );

        $event3 = $this->create(
            'event-first-paris-group-paris',
            self::EVENT_03_UUID,
            'First event in Paris',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            '+4 days',
            '+6 days',
            'actor-paris',
            'group-paris-ecology-approved',
            'city-paris',
            '789 random street'
        );

        $event4 = $this->create(
            'event-second-paris-group-paris',
            self::EVENT_04_UUID,
            'Second event in Paris',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            '+7 days',
            '+8 days',
            'actor-paris',
            'group-paris-ecology-approved',
            'city-paris',
            '123 random street'
        );

        $event5 = $this->create(
            'event-finished-first-paris-group-paris',
            self::EVENT_05_UUID,
            'First finished event in Paris',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            '-4 days',
            '-2 days',
            'actor-paris',
            'group-paris-ecology-approved',
            'city-paris',
            '234 random street'
        );

        $event6 = $this->create(
            'event-finished-second-paris-group-paris',
            self::EVENT_06_UUID,
            'Second finished event in Paris',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            '-3 days',
            '-1 day',
            'actor-nice',
            'group-paris-ecology-approved',
            'city-nice',
            '345 random street'
        );

        // group is now refused
        $event7 = $this->create(
            'event-lille-group-lille',
            self::EVENT_07_UUID,
            'Event in Lille',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            '+2 days',
            '+3 days',
            'actor-lille',
            'group-lille-approved-and-refused',
            'city-lille',
            '345 random street'
        );

        $event8 = $this->create(
            'event-clichy-group-clichy',
            self::EVENT_08_UUID,
            'Event ecology in Clichy',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            '-2 days',
            '-1 day',
            'actor-nantes',
            'group-clichy-ecology-approved',
            'city-nantes',
            '345 random street'
        );

        $event9 = $this->create(
            'event-asnieres-group-asnieres',
            self::EVENT_09_UUID,
            'Event in Asnieres',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            '-2 days',
            '+3 days',
            'actor-cannes',
            'group-asnieres-approved',
            'city-cannes',
            '345 random street'
        );

        $event10 = $this->create(
            'event-nice-group-nice',
            self::EVENT_10_UUID,
            'Event in Nice',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            '+3 days',
            '+5 days',
            'actor-cannes',
            'group-nice-ecology-approved',
            'city-asnieres',
            '345 random street'
        );

        $manager->persist($event1);
        $manager->persist($event2);
        $manager->persist($event3);
        $manager->persist($event4);
        $manager->persist($event5);
        $manager->persist($event6);
        $manager->persist($event7);
        $manager->persist($event8);
        $manager->persist($event9);
        $manager->persist($event10);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ActorFixtures::class,
            CityFixtures::class,
            GroupFixtures::class,
        ];
    }

    private function create(
        string $reference,
        string $uuid,
        string $name,
        string $description,
        string $beginAt,
        string $finishAt,
        string $creatorReference,
        string $groupReference,
        string $cityReference,
        string $address = null
    ): Event {
        $event = new Event(Uuid::fromString($uuid));

        $event->setName($name);
        $event->setDescription($description);
        $event->setBeginAt(new \DateTimeImmutable($beginAt));
        $event->setFinishAt(new \DateTimeImmutable($finishAt));
        $event->setCreator($this->getReference($creatorReference));
        $event->setGroup($this->getReference($groupReference));
        $event->setCity($this->getReference($cityReference));

        if ($address) {
            $event->setAddress($address);
        }

        $this->slugify->createSlug($event);

        $this->setReference($reference, $event);

        return $event;
    }
}
