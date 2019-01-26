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
        yield ['marine@mobilisation-eu.code', ['Paris', 'Clichy',  'Asnières-sur-Seine']];
        // Actor from Bois-Colombes
        yield ['remi@mobilisation-eu.code', ['Asnières-sur-Seine', 'Clichy', 'Paris']];
        // Actor from Clichy
        yield ['titouan@mobilisation-eu.code', ['Clichy', 'Asnières-sur-Seine', 'Paris']];
        // Actor from Asnières-sur-Seine
        yield ['francis@mobilisation-eu.code', ['Asnières-sur-Seine', 'Clichy', 'Paris']];
        // Actor from Nice
        yield ['jacques@mobilisation-eu.code', ['Nice', 'Cannes']];
        // Actor from Cannes
        yield ['nicolas@mobilisation-eu.code', ['Cannes', 'Nice']];
        // Actor from Nantes
        yield ['manon@mobilisation-eu.code', ['Nantes']];
        // Actor from Lille
        yield ['thomas@mobilisation-eu.code', []];
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
