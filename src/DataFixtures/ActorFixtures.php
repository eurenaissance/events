<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ActorFixtures extends Fixture
{
    public const DEFAULT_PASSWORD = 'secret!12345';

    public const ACTOR_01_UUID = '472508fa-4e4d-4330-8fda-5fefc92b1a8a';
    public const ACTOR_02_UUID = '7ba7b43a-4a65-4862-b49a-91776043575b';

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
            'gender' => 'male',
        ]);

        $actor2 = $this->create([
            'uuid' => self::ACTOR_02_UUID,
            'emailAddress' => 'titouan@mobilisation.eu',
            'firstName' => 'Titouan',
            'lastName' => 'Galopin',
            'birthday' => '2001-01-13',
        ]);

        $manager->persist($actor1);
        $manager->persist($actor2);

        $manager->flush();
    }

    private function create(array $data): Actor
    {
        $actor = new Actor(Uuid::fromString($data['uuid']));

        $actor->setEmailAddress($data['emailAddress']);
        $actor->setFirstName($data['firstName']);
        $actor->setLastName($data['lastName']);
        $actor->setBirthday(new \DateTime($data['birthday']));
        $actor->setPassword($this->encoder->encodePassword($actor, self::DEFAULT_PASSWORD));

        if (isset($data['gender'])) {
            $actor->setGender($data['gender']);
        }

        return $actor;
    }
}
