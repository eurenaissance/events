<?php

namespace App\DataFixtures;

use App\Entity\ActorResetPasswordToken;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;

class ActorResetPasswordTokenFixtures extends Fixture implements DependentFixtureInterface
{
    public const TOKEN_01_UUID = 'c0eeb0f4-b4ac-4ee0-9af1-529d1c054916';
    public const TOKEN_02_UUID = '9e2234d7-4de9-45cf-ae6b-42912218911f';
    public const TOKEN_03_UUID = 'ee640b58-603e-425b-ab98-b1fa498e7e3a';

    public function load(ObjectManager $manager)
    {
        $token1 = $this->create([
            'uuid' => self::TOKEN_01_UUID,
            'actor' => 'actor-2',
            'expiredAt' => '+1 day',
        ]);

        $token2 = $this->create([
            'uuid' => self::TOKEN_02_UUID,
            'actor' => 'actor-2',
            'expiredAt' => '-5 minutes',
        ]);

        $token3 = $this->create([
            'uuid' => self::TOKEN_03_UUID,
            'actor' => 'actor-2',
            'expiredAt' => '+12 hours',
        ]);
        $token3->consume();

        $manager->persist($token1);
        $manager->persist($token2);
        $manager->persist($token3);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ActorFixtures::class,
        ];
    }

    private function create(array $data): ActorResetPasswordToken
    {
        $token = new ActorResetPasswordToken(
            Uuid::fromString($data['uuid']),
            $this->getReference($data['actor']),
            new \DateTime($data['expiredAt'])
        );

        return $token;
    }
}
