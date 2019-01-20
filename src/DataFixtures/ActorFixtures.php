<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    public const DEFAULT_PASSWORD = 'secret!12345';

    public const ACTOR_01_UUID = '472508fa-4e4d-4330-8fda-5fefc92b1a8a';
    public const ACTOR_02_UUID = '7ba7b43a-4a65-4862-b49a-91776043575b';
    public const ACTOR_03_UUID = 'b4e514ac-5ccb-4687-aed1-14d3678b5491';
    public const ACTOR_04_UUID = '9b1f4321-8935-4ab5-b392-1e6f6913ace9';

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $actor1 = $this->create([
            'uuid' => self::ACTOR_01_UUID,
            'emailAddress' => 'remi@mobilisation.eu',
            'firstName' => 'Rémi',
            'lastName' => 'Gardien',
            'birthday' => '1988-11-27',
            'city' => 'city-2',
            'confirmed' => true,
        ]);

        $actor2 = $this->create([
            'uuid' => self::ACTOR_02_UUID,
            'emailAddress' => 'titouan@mobilisation.eu',
            'firstName' => 'Titouan',
            'lastName' => 'Galopin',
            'birthday' => '1994-12-01',
            'gender' => 'male',
            'city' => 'city-1',
            'confirmed' => true,
        ]);

        $actor3 = $this->create([
            'uuid' => self::ACTOR_03_UUID,
            'emailAddress' => 'marine@mobilisation.eu',
            'firstName' => 'Marine',
            'lastName' => 'Boudeau',
            'birthday' => '1983-11-09',
            'city' => 'city-1',
            'gender' => 'female',
        ]);

        $actor4 = $this->create([
            'uuid' => self::ACTOR_04_UUID,
            'emailAddress' => 'nicolas@mobilisation.eu',
            'firstName' => 'Nicolas',
            'lastName' => 'Cage',
            'birthday' => '1964-01-07',
            'city' => 'city-6',
            'address' => '2 random street',
            'gender' => 'male',
        ]);

        $this->setReference('actor-1', $actor1);
        $this->setReference('actor-2', $actor2);
        $this->setReference('actor-3', $actor3);
        $this->setReference('actor-4', $actor4);

        $manager->persist($actor1);
        $manager->persist($actor2);
        $manager->persist($actor3);
        $manager->persist($actor4);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CityFixtures::class,
        ];
    }

    private function create(array $data): Actor
    {
        $actor = new Actor(Uuid::fromString($data['uuid']));

        $actor->setEmailAddress($data['emailAddress']);
        $actor->setFirstName($data['firstName']);
        $actor->setLastName($data['lastName']);
        $actor->setBirthday(new \DateTime($data['birthday']));
        $actor->setPassword($this->encoder->encodePassword($actor, self::DEFAULT_PASSWORD));
        $actor->setCity($this->getReference($data['city']));

        if (isset($data['gender'])) {
            $actor->setGender($data['gender']);
        }

        if (isset($data['address'])) {
            $actor->setAddress($data['address']);
        }

        if (isset($data['confirmed']) && true === $data['confirmed']) {
            $actor->confirm();
        }

        return $actor;
    }
}
