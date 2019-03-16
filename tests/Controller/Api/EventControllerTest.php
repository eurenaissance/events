<?php

namespace App\Tests\Controller\Api;

use App\Tests\HttpTestCase;

class EventControllerTest extends HttpTestCase
{
    public function provideValidTokens(): iterable
    {
        yield [
            'email' => 'emmanuel@mobilisation-eu.localhost',
            'token' => 'a14bc7d137fc5d3f21cbe10abe9cb6d3427d704c1',
        ];

        yield [
            'email' => 'emmanuel@mobilisation-eu.localhost',
            'token' => 'b14bc7d137fc5d3f21cbe10abe9cb6d3427d704c1',
        ];
    }

    public function provideInvalidTokens(): iterable
    {
        yield [
            'email' => 'emmanuel@mobilisation-eu.localhost',
            'token' => 'c14bc7d137fc5d3f21cbe10abe9cb6d3427d704c1',
        ];

        yield [
            'email' => 'emmanuel@mobilisation-eu.localhost',
            'token' => 'd14bc7d137fc5d3f21cbe10abe9cb6d3427d704c1',
        ];
    }

    /**
     * @dataProvider provideValidTokens
     */
    public function testEventApiWithValidTokens(string $email, string $token): void
    {
        $this->authenticateActor($email);

        $this->client->request('GET', sprintf('/api/events/all?token=%s', $token));
        $this->assertResponseSuccessFul();

        $this->assertNotEmpty(json_decode($this->client->getResponse()->getContent(), true));
    }

    /**
     * @dataProvider provideInvalidTokens
     */
    public function testEventApiWithInvalidTokens(string $email, string $token): void
    {
        $this->authenticateActor($email);

        $this->client->request('GET', sprintf('/api/events/all?token=%s', $token));

        $this->assertSame(400, $this->client->getResponse()->getStatusCode());
    }
}
