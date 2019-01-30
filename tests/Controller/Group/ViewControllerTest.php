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
        // refused groups
        yield ['development-in-bois-colombes'];
        yield ['development-in-paris'];
        yield ['development-in-lille'];
        // pending groups
        yield ['culture-in-paris'];
        // approved group
        yield ['ecology-in-clichy'];
        yield ['ecology-in-paris'];
        yield ['ecology-in-nantes'];
        yield ['ecology-in-nice'];
        yield ['culture-in-cannes'];
        yield ['culture-in-asnieres'];
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
        yield ['remi@mobilisation-eu.localhost']; // animator of the refused group
        yield ['titouan@mobilisation-eu.localhost']; // animator of another confirmed group
        yield ['marine@mobilisation-eu.localhost']; // animator of another pending group
        yield ['didier@mobilisation-eu.localhost']; // no relation with any group
        yield ['francis@mobilisation-eu.localhost'];
        yield ['jacques@mobilisation-eu.localhost'];
        yield ['nicolas@mobilisation-eu.localhost'];
    }

    /**
     * @dataProvider provideActorsForRefusedGroup
     */
    public function testNoOneCanViewRefusedGroup(string $email): void
    {
        $this->authenticateActor($email);

        $this->client->request('GET', '/group/development-in-bois-colombes');
        $this->assertNotFoundResponse();
    }

    public function provideActorsForPendingGroup(): iterable
    {
        yield ['remi@mobilisation-eu.localhost']; // animator of another refused group
        yield ['titouan@mobilisation-eu.localhost']; // animator of another confirmed group
        yield ['didier@mobilisation-eu.localhost']; // no relation with any group
        yield ['francis@mobilisation-eu.localhost'];
        yield ['jacques@mobilisation-eu.localhost'];
        yield ['nicolas@mobilisation-eu.localhost'];
    }

    /**
     * @dataProvider provideActorsForPendingGroup
     */
    public function testActorCannotViewPendingGroup(string $email): void
    {
        $this->authenticateActor($email);

        $this->client->request('GET', '/group/culture-in-paris');
        $this->assertAccessDeniedResponse();
    }

    public function testAnimatorCanViewHisPendingGroup(): void
    {
        $this->authenticateActor('marine@mobilisation-eu.localhost');

        $this->client->request('GET', '/group/culture-in-paris');
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('<h1>Culture in Paris</h1>');
    }

    public function provideActorsForConfirmedGroup(): iterable
    {
        yield ['remi@mobilisation-eu.localhost']; // animator of another refused group
        yield ['titouan@mobilisation-eu.localhost']; // animator of another confirmed group
        yield ['marine@mobilisation-eu.localhost']; // animator of the confirmed group
        yield ['didier@mobilisation-eu.localhost']; // no relation with any group
        yield ['francis@mobilisation-eu.localhost'];
        yield ['jacques@mobilisation-eu.localhost'];
        yield ['nicolas@mobilisation-eu.localhost'];
    }

    /**
     * @dataProvider provideActorsForConfirmedGroup
     */
    public function testActorCanViewConfirmedGroup(string $email): void
    {
        $this->authenticateActor($email);

        $this->client->request('GET', '/group/ecology-in-paris');
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('<h1>Ecology in Paris</h1>');
    }
}
