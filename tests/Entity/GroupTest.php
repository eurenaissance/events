<?php

namespace App\Tests\Entity;

use App\Entity\Group;
use App\Tests\UnitTestCase;
use Ramsey\Uuid\Uuid;

/**
 * @group unit
 */
class GroupTest extends UnitTestCase
{
    public function testReview(): void
    {
        $group = $this->createGroup();
        $this->assertTrue($group->isPending());
        $this->assertFalse($group->isApproved());
        $this->assertFalse($group->isRefused());
        $this->assertNull($group->getApprovedAt());
        $this->assertNull($group->getRefusedAt());

        $group->approve();
        $this->assertFalse($group->isPending());
        $this->assertTrue($group->isApproved());
        $this->assertFalse($group->isRefused());
        $this->assertInstanceOf(\DateTimeInterface::class, $group->getApprovedAt());
        $this->assertNull($group->getRefusedAt());

        $group->refuse();
        $this->assertFalse($group->isPending());
        $this->assertFalse($group->isApproved());
        $this->assertTrue($group->isRefused());
        $this->assertInstanceOf(\DateTimeInterface::class, $group->getApprovedAt());
        $this->assertInstanceOf(\DateTimeInterface::class, $group->getRefusedAt());
        $this->assertGreaterThan($group->getApprovedAt(), $group->getRefusedAt());

        $group->approve();
        $this->assertFalse($group->isPending());
        $this->assertTrue($group->isApproved());
        $this->assertFalse($group->isRefused());
        $this->assertInstanceOf(\DateTimeInterface::class, $group->getApprovedAt());
        $this->assertNull($group->getRefusedAt());
    }

    public function provideNames(): iterable
    {
        yield ['Ecology in Paris'];
        yield ['Ecology in Clichy'];
        yield ['Culture in Cannes'];
        yield ['Culture in Nice'];
    }

    /**
     * @dataProvider provideNames
     */
    public function testCreateSlugSource(string $slug): void
    {
        $group = $this->createGroup();
        $group->setName($slug);

        $this->assertSame($slug, $group->getName());
        $this->assertSame($slug, $group->createSlugSource());
    }

    public function provideEquals(): iterable
    {
        yield ['64246cf5-9b63-4e3c-949f-50d276c2c9d2'];
        yield ['d72da7d1-92bb-4be5-9e0e-83aa2a5dd335'];
        yield ['c91893b8-cfbb-4000-838e-7faa46cb20d9'];
        yield ['59502dcd-291b-4ebc-8440-29f912be291a'];
        yield ['cd14a575-f14d-4d2a-a3dd-0e799cf3adbe'];
    }

    /**
     * @dataProvider provideEquals
     */
    public function testEquals(string $uuid): void
    {
        $group1 = $this->createGroup($uuid);
        $group2 = $this->createGroup($uuid);

        $this->assertTrue($group1->equals($group1));
        $this->assertTrue($group2->equals($group2));
        $this->assertTrue($group1->equals($group2));
        $this->assertTrue($group2->equals($group1));
    }

    public function provideNotEquals(): iterable
    {
        yield ['64246cf5-9b63-4e3c-949f-50d276c2c9d2', 'baa530cc-1ade-4275-9e8c-ba3530507c0e'];
        yield ['d72da7d1-92bb-4be5-9e0e-83aa2a5dd335', '7d94e9cf-1f88-4fd4-82a8-6e4a8949f000'];
        yield ['c91893b8-cfbb-4000-838e-7faa46cb20d9', '9dd181af-58a5-42f4-91d6-1e0b6c6723a5'];
        yield ['59502dcd-291b-4ebc-8440-29f912be291a', 'dfb92581-1b79-452b-9d5d-43c8a5060a97'];
        yield ['cd14a575-f14d-4d2a-a3dd-0e799cf3adbe', '9159df14-4052-4355-aec6-54d4eec67744'];
    }

    /**
     * @dataProvider provideNotEquals
     */
    public function testNotEquals(string $uuid1, string $uuid2): void
    {
        $group1 = $this->createGroup($uuid1);
        $group2 = $this->createGroup($uuid2);

        $this->assertTrue($group1->equals($group1));
        $this->assertTrue($group2->equals($group2));
        $this->assertFalse($group1->equals($group2));
        $this->assertFalse($group2->equals($group1));
    }

    private function createGroup(string $uuid = null): Group
    {
        return new Group($uuid ? Uuid::fromString($uuid) : null);
    }
}
