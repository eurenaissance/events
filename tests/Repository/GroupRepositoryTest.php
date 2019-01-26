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
        // Actor from Bois-Colombes
        yield ['remi@mobilisation.eu', ['Bois-Colombes', 'Clichy', 'Paris', 'Nice']];
        // Actor from Paris
        yield ['titouan@mobilisation.eu', ['Paris', 'Clichy', 'Bois-Colombes', 'Nice']];
        // Actor from Clichy
        yield ['john@mobilisation.eu', ['Clichy', 'Bois-Colombes', 'Paris', 'Nice']];
        // Actor from Nice
        yield ['jane@mobilisation.eu', ['Nice', 'Paris', 'Clichy', 'Bois-Colombes']];
    }

    /**
     * @dataProvider provideClosestGroupsFromActor
     */
    public function testFindClosestFrom(string $email, array $expectedOrderedGroups): void
    {
        $actor = $this->manager->getRepository(Actor::class)->findOneByEmail($email);

        /** @var GroupRepository $repository */
        $repository = $this->manager->getRepository(Group::class);

        $closestGroups = $repository->findClosestFrom($actor, count($expectedOrderedGroups));

        $this->assertSame($expectedOrderedGroups, array_map(function (Group $group) {
            return $group->getCity()->getName();
        }, $closestGroups));
    }
}
