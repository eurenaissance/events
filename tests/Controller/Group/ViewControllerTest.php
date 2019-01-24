<?php

namespace Test\App\Controller;

use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class ViewControllerTest extends HttpTestCase
{
    public function provideGroupsForAnonymous(): iterable
    {
        yield ['this-is-a-refused-group'];
        yield ['this-is-a-pending-group'];
        yield ['this-is-a-confirmed-group'];
    }

    /**
     * @dataProvider provideGroupsForAnonymous
     */
    public function testAnonymousCannotViewAnyGroup(string $slug): void
    {
        $this->client->request('GET', "/group/$slug");
        $this->assertIsRedirectedTo('/login');
    }

    public function provideActorsForRefusedGroup(): iterable
    {
        yield ['remi@mobilisation.eu']; // animator of the refused group
        yield ['titouan@mobilisation.eu']; // animator of another confirmed group
        yield ['marine@mobilisation.eu']; // animator of another pending group
        yield ['nicolas@mobilisation.eu']; // no relation with any group
    }

    /**
     * @dataProvider provideActorsForRefusedGroup
     */
    public function testNoOneCanViewRefusedGroup(string $email): void
    {
        $this->authenticateActor($email);

        $this->client->request('GET', '/group/this-is-a-refused-group');
        $this->assertAccessDeniedResponse();
    }

    public function provideActorsForPendingGroup(): iterable
    {
        yield ['remi@mobilisation.eu']; // animator of another refused group
        yield ['titouan@mobilisation.eu']; // animator of another confirmed group
        yield ['nicolas@mobilisation.eu']; // no relation with any group
    }

    /**
     * @dataProvider provideActorsForPendingGroup
     */
    public function testActorCannotViewPendingGroup(string $email): void
    {
        $this->authenticateActor($email);

        $this->client->request('GET', '/group/this-is-a-pending-group');
        $this->assertAccessDeniedResponse();
    }

    public function testAnimatorCanViewHisPendingGroup(): void
    {
        $this->authenticateActor('marine@mobilisation.eu');

        $this->client->request('GET', '/group/this-is-a-pending-group');
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('Group: This is a pending group');
    }

    public function provideActorsForConfirmedGroup(): iterable
    {
        yield ['remi@mobilisation.eu']; // animator of another refused group
        yield ['titouan@mobilisation.eu']; // animator of the confirmed group
        yield ['marine@mobilisation.eu']; // animator of another pending group
        yield ['nicolas@mobilisation.eu']; // no relation with any group
    }

    /**
     * @dataProvider provideActorsForConfirmedGroup
     */
    public function testActorCanViewConfirmedGroup(string $email): void
    {
        $this->authenticateActor($email);

        $this->client->request('GET', '/group/this-is-a-confirmed-group');
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('Group: This is a confirmed group');
    }
}
