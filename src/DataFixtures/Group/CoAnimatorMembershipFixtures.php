<?php

namespace App\DataFixtures\Group;

use App\DataFixtures\ActorFixtures;
use App\DataFixtures\GroupFixtures;
use App\Entity\Group\CoAnimatorMembership;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CoAnimatorMembershipFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $manager->persist($this->create('actor-paris', 'group-clichy-ecology-approved'));
        $manager->persist($this->create('actor-clichy', 'group-paris-ecology-approved'));
        $manager->persist($this->create('actor-asnieres', 'group-paris-ecology-approved'));
        $manager->persist($this->create('actor-bois-colombes', 'group-lille-approved-and-refused'));

        $manager->flush();
    }

    public function create(string $actorReference, string $groupReference): CoAnimatorMembership
    {
        return CoAnimatorMembership::create($this->getReference($actorReference), $this->getReference($groupReference));
    }

    public function getDependencies()
    {
        return [
            ActorFixtures::class,
            GroupFixtures::class,
        ];
    }
}
