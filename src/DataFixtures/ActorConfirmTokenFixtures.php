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
    public const TOKEN_04_UUID = 'a17b33a2-b55d-4040-bf27-8452e4237724';
    public const TOKEN_05_UUID = '728f16fa-cc23-4091-915b-3908e2320e93';

    public function load(ObjectManager $manager)
    {
        $token1 = $this->create([
            'uuid' => self::TOKEN_01_UUID,
            'actor' => 'actor-1',
            'expiredAt' => '+1 hour',
        ]);
        $token1->consume();

        // Expired token for actor-2
        $token2 = $this->create([
            'uuid' => self::TOKEN_02_UUID,
            'actor' => 'actor-2',
            'expiredAt' => '2 hours ago',
        ]);

        // Consumed token for actor-2
        $token3 = $this->create([
            'uuid' => self::TOKEN_03_UUID,
            'actor' => 'actor-2',
            'expiredAt' => '+1 hour',
        ]);
        $token3->consume();

        // Pending token for actor-3
        $token4 = $this->create([
            'uuid' => self::TOKEN_04_UUID,
            'actor' => 'actor-3',
            'expiredAt' => '+1 hour',
        ]);

        // Expired token for actor-4
        $token5 = $this->create([
            'uuid' => self::TOKEN_05_UUID,
            'actor' => 'actor-4',
            'expiredAt' => '2 hours ago',
        ]);

        $manager->persist($token1);
        $manager->persist($token2);
        $manager->persist($token3);
        $manager->persist($token4);
        $manager->persist($token5);

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
            $this->getReference($data['actor']),
            new \DateTimeImmutable($data['expiredAt'])
        );

        return $token;
    }
}
