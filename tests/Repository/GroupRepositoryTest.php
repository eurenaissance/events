<?php

namespace App\Tests\Repository;

use App\Entity\Actor;
use App\Entity\Group;
use App\Repository\GroupRepository;
use App\Tests\RepositoryTestCase;

/**
 * @group functional
 */
class GroupRepositoryTest extends RepositoryTestCase
{
    public function provideClosestGroupsFromActor(): iterable
    {
        // Actor from Paris
        yield ['marine@mobilisation-eu.localhost', ['Paris', 'Clichy',  'Asnières-sur-Seine']];
        // Actor from Bois-Colombes
        yield ['remi@mobilisation-eu.localhost', ['Asnières-sur-Seine', 'Clichy', 'Paris']];
        // Actor from Clichy
        yield ['titouan@mobilisation-eu.localhost', ['Clichy', 'Asnières-sur-Seine', 'Paris']];
        // Actor from Asnières-sur-Seine
        yield ['francis@mobilisation-eu.localhost', ['Asnières-sur-Seine', 'Clichy', 'Paris']];
        // Actor from Nice
        yield ['jacques@mobilisation-eu.localhost', ['Nice', 'Cannes']];
        // Actor from Cannes
        yield ['nicolas@mobilisation-eu.localhost', ['Cannes', 'Nice']];
        // Actor from Nantes
        yield ['manon@mobilisation-eu.localhost', ['Nantes']];
        // Actor from Lille
        yield ['thomas@mobilisation-eu.localhost', []];
    }

    /**
     * @dataProvider provideClosestGroupsFromActor
     */
    public function testFindClosestFrom(string $email, array $expectedOrderedGroups): void
    {
        $actor = $this->manager->getRepository(Actor::class)->findOneByEmail($email);

        /** @var GroupRepository $repository */
        $repository = $this->manager->getRepository(Group::class);

        $closestGroups = $repository->findClosestFrom($actor);

        $this->assertSame($expectedOrderedGroups, array_map(function (Group $group) {
            return $group->getCity()->getName();
        }, $closestGroups));
    }
}
