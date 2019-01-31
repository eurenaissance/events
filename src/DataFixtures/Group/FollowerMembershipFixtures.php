<?php

namespace App\DataFixtures\Group;

use App\DataFixtures\ActorFixtures;
use App\DataFixtures\GroupFixtures;
use App\Entity\Group\FollowerMembership;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class FollowerMembershipFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $manager->persist($this->create('actor-bois-colombes', 'group-paris-ecology-approved'));
        $manager->persist($this->create('actor-bois-colombes', 'group-asnieres-approved'));
        $manager->persist($this->create('actor-bois-colombes', 'group-clichy-ecology-approved'));
        $manager->persist($this->create('actor-paris', 'group-asnieres-approved'));
        $manager->persist($this->create('actor-nice', 'group-cannes-approved'));
        $manager->persist($this->create('actor-cannes', 'group-nice-ecology-approved'));
        $manager->persist($this->create('actor-cannes', 'group-lille-approved-and-refused'));

        $manager->flush();
    }

    public function create(string $actorReference, string $groupReference): FollowerMembership
    {
        return FollowerMembership::create($this->getReference($actorReference), $this->getReference($groupReference));
    }

    public function getDependencies()
    {
        return [
            ActorFixtures::class,
            GroupFixtures::class,
        ];
    }
}
