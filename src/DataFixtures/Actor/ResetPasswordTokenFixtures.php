<?php

namespace App\DataFixtures\Actor;

use App\DataFixtures\ActorFixtures;
use App\Entity\Actor\ResetPasswordToken;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;

class ResetPasswordTokenFixtures extends Fixture implements DependentFixtureInterface
{
    public const TOKEN_01_UUID = 'c0eeb0f4-b4ac-4ee0-9af1-529d1c054916';
    public const TOKEN_02_UUID = '9e2234d7-4de9-45cf-ae6b-42912218911f';
    public const TOKEN_03_UUID = 'ee640b58-603e-425b-ab98-b1fa498e7e3a';

    public function load(ObjectManager $manager)
    {
        // pending token
        $token1 = $this->create(self::TOKEN_01_UUID, 'actor-bois-colombes', '+1 day');

        // expired token
        $token2 = $this->create(self::TOKEN_02_UUID, 'actor-bois-colombes', '-5 minutes');

        // consumed token
        $token3 = $this->create(self::TOKEN_03_UUID, 'actor-clichy', '+12 hours');
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

    private function create(string $uuid, string $actorReference, string $expiredAt): ResetPasswordToken
    {
        return new ResetPasswordToken(
            Uuid::fromString($uuid),
            $this->getReference($actorReference),
            new \DateTimeImmutable($expiredAt)
        );
    }
}
