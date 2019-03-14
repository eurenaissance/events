<?php

namespace App\DataFixtures;

use App\Entity\ApiToken;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TokenFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $token1 = $this->create('token 1');
        $token2 = $this->create('token 2');
        $token3 = $this->create('token 3', 'b14bc7d137fc5d3f21cbe10abe9cb6d3427d704c1');
        $token4 = $this->create('token 4', 'a14bc7d137fc5d3f21cbe10abe9cb6d3427d704c1');

        $manager->persist($token1);
        $manager->persist($token2);
        $manager->persist($token3);
        $manager->persist($token4);

        $manager->flush();
    }

    private function create(
        string $description,
        string $token = null
    ): ApiToken {
        $apiToken = new ApiToken();

        $apiToken->setDescription($description);
        if (null !== $token) {
            $apiToken->setToken($token);
        }

        return $apiToken;
    }
}
