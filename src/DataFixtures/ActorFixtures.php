<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use App\Security\PasswordEncoder;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;

class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    public const DEFAULT_PASSWORD = 'secret!12345';

    public const ACTOR_01_UUID = '472508fa-4e4d-4330-8fda-5fefc92b1a8a';
    public const ACTOR_02_UUID = '7ba7b43a-4a65-4862-b49a-91776043575b';
    public const ACTOR_03_UUID = 'b4e514ac-5ccb-4687-aed1-14d3678b5491';
    public const ACTOR_04_UUID = '9b1f4321-8935-4ab5-b392-1e6f6913ace9';
    public const ACTOR_05_UUID = 'a43cc607-9c38-45dc-afda-82e06af69a6a';
    public const ACTOR_06_UUID = '99f7783e-e0ad-4fd7-b34e-4ff061635e51';
    public const ACTOR_07_UUID = 'be5a9279-fca4-41fb-b4b7-13b266408cba';
    public const ACTOR_08_UUID = '2a9051e9-7cea-460f-a714-052079d4aa2b';
    public const ACTOR_09_UUID = 'bf485b41-dad1-4226-87b6-66b925c29a80';
    public const ACTOR_10_UUID = '4001a167-a417-4bfe-87bb-a15a861d0b93';
    public const ACTOR_11_UUID = '676f8e4f-b01d-4496-bce8-34bd2a1f4094';

    private $encoder;

    public function __construct(PasswordEncoder $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $actor1 = $this->create(
            'actor-bois-colombes',
            self::ACTOR_01_UUID,
            'remi@mobilisation-eu.localhost',
            'Rémi',
            'Gardien',
            '1988-11-27',
            'city-bois-colombes'
        );
        $actor1->confirm();

        $actor2 = $this->create(
            'actor-clichy',
            self::ACTOR_02_UUID,
            'titouan@mobilisation-eu.localhost',
            'Titouan',
            'Galopin',
            '1994-12-01',
            'city-clichy',
            'male'
        );
        $actor2->confirm();

        $actor3 = $this->create(
            'actor-paris',
            self::ACTOR_03_UUID,
            'marine@mobilisation-eu.localhost',
            'Marine',
            'Boudeau',
            '1983-11-09',
            'city-paris',
            'female',
            '123 random street'
        );
        $actor3->confirm();

        $actor4 = $this->create(
            'actor-asnieres',
            self::ACTOR_04_UUID,
            'francis@mobilisation-eu.localhost',
            'Francis',
            'Brioul',
            '1971-04-18',
            'city-asnieres',
            'other'
        );
        $actor4->confirm();

        $actor5 = $this->create(
            'actor-nice',
            self::ACTOR_05_UUID,
            'jacques@mobilisation-eu.localhost',
            'Jacques',
            'Picard',
            '1975-10-07',
            'city-nice'
        );
        $actor5->confirm();

        $actor6 = $this->create(
            'actor-lille',
            self::ACTOR_06_UUID,
            'thomas@mobilisation-eu.localhost',
            'Thomas',
            'Legros',
            '1982-02-16',
            'city-lille'
        );
        $actor6->confirm();

        $actor7 = $this->create(
            'actor-nantes',
            self::ACTOR_07_UUID,
            'manon@mobilisation-eu.localhost',
            'Manon',
            'Mercier',
            '1984-01-28',
            'city-nantes'
        );
        $actor7->confirm();

        $actor8 = $this->create(
            'actor-cannes',
            self::ACTOR_08_UUID,
            'nicolas@mobilisation-eu.localhost',
            'Nicolas',
            'Cage',
            '1964-01-07',
            'city-cannes',
            'male',
            '123 random street'
        );
        $actor8->confirm();

        // not confirmed yet with pending confirmation token
        $actor9 = $this->create(
            'actor-nice-2',
            self::ACTOR_09_UUID,
            'leonard@mobilisation-eu.localhost',
            'Léonard',
            'Matthieu',
            '1980-03-11',
            'city-nice'
        );

        // not confirmed yet with expired confirmation token
        $actor10 = $this->create(
            'actor-clichy-2',
            self::ACTOR_10_UUID,
            'patrick@mobilisation-eu.localhost',
            'Patrick',
            'Marchand',
            '1986-03-02',
            'city-clichy'
        );

        // no relation with any group
        $actor11 = $this->create(
            'actor-paris-3',
            self::ACTOR_11_UUID,
            'didier@mobilisation-eu.localhost',
            'Didier',
            'Lemoine',
            '1965-02-07',
            'city-paris'
        );
        $actor11->confirm();

        $manager->persist($actor1);
        $manager->persist($actor2);
        $manager->persist($actor3);
        $manager->persist($actor4);
        $manager->persist($actor5);
        $manager->persist($actor6);
        $manager->persist($actor7);
        $manager->persist($actor8);
        $manager->persist($actor9);
        $manager->persist($actor10);
        $manager->persist($actor11);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CityFixtures::class,
        ];
    }

    private function create(
        string $reference,
        string $uuid,
        string $email,
        string $firstName,
        string $lastName,
        string $birthday,
        string $cityReference,
        ?string $gender = null,
        ?string $address = null
    ): Actor {
        $actor = new Actor(Uuid::fromString($uuid));

        $actor->setEmailAddress($email);
        $actor->setFirstName($firstName);
        $actor->setLastName($lastName);
        $actor->setBirthday(new \DateTimeImmutable($birthday));
        $actor->setCity($this->getReference($cityReference));
        $actor->setCoordinates($this->getReference($cityReference)->getCoordinates());

        if ($gender) {
            $actor->setGender($gender);
        }

        if ($address) {
            $actor->setAddress($address);
        }

        $this->encoder->encodePassword($actor, self::DEFAULT_PASSWORD);

        $this->setReference($reference, $actor);

        return $actor;
    }
}
