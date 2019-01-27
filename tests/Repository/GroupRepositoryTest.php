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
        yield ['remi@mobilisation.eu', ['Bois-Colombes', 'Clichy', 'Paris']];
        // Actor from Paris
        yield ['titouan@mobilisation.eu', ['Paris', 'Clichy', 'Bois-Colombes']];
        // Actor from Clichy
        yield ['john@mobilisation.eu', ['Clichy', 'Bois-Colombes', 'Paris']];
        // Actor from Nice
        yield ['jane@mobilisation.eu', ['Nice']];
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
