<?php

namespace App\DataFixtures;

use App\Entity\ActorConfirmToken;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;

class ActorConfirmTokenFixtures extends Fixture implements DependentFixtureInterface
{
    public const TOKEN_01_UUID = 'b0133ae2-1d69-473a-bff1-68b75b470488';
    public const TOKEN_02_UUID = '95eb31bb-cf66-42bf-a5ed-33d046a9f9eb';
    public const TOKEN_03_UUID = 'ebe8f1ba-4f50-446e-b2d6-6097881e3df6';

    public function load(ObjectManager $manager)
    {
        $token1 = $this->create([
            'uuid' => self::TOKEN_01_UUID,
            'actor' => 'actor-1',
        ]);
        $token1->consume();

        $token2 = $this->create([
            'uuid' => self::TOKEN_02_UUID,
            'actor' => 'actor-2',
        ]);
        $token2->consume();

        $token3 = $this->create([
            'uuid' => self::TOKEN_03_UUID,
            'actor' => 'actor-3',
        ]);

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

    private function create(array $data): ActorConfirmToken
    {
        $token = new ActorConfirmToken(
            Uuid::fromString($data['uuid']),
            $this->getReference($data['actor'])
        );

        return $token;
    }
}
