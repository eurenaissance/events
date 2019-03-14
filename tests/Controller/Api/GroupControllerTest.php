<?php

namespace Test\App\Controller\Api;

use App\DataFixtures\GroupFixtures;
use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class GroupControllerTest extends HttpTestCase
{
    public function provideAutocompleteSuccess(): iterable
    {
        yield ['mous', [
                [
                    'name' => 'Culture in Mouscron',
                ],
                [
                    'name' => 'Ecology in Mouscron',
                ],
            ],
        ];
        yield ['lil', [
                [
                    'name' => 'Development in Lille',
                ],
            ],
        ];
        yield ['par', []]; // too far (> 150km)
    }

    /**
     * @dataProvider provideAutocompleteSuccess
     */
    public function testAutocompleteSuccess(string $term, array $expectedGroups): void
    {
        $this->authenticateActor('emmanuel@mobilisation-eu.localhost');

        $this->client->request('GET', "/api/group/autocomplete/$term");
        $this->assertJsonResponse($expectedGroups);
    }

    public function testShowSuccess(): void
    {
        $this->authenticateActor('emmanuel@mobilisation-eu.localhost');

        $this->client->request('GET', '/api/group/'.GroupFixtures::GROUP_12_UUID);
        $this->assertJsonResponse([
            'name' => 'Ecology in Mouscron',
            'uuid' => 'baa530cc-1ade-4275-9e8c-56896bc07c0e',
            'address' => '345 random street',
            'city' => [
                'name' => 'Mouscron',
                'uuid' => '43b95711-0c51-4bc1-8c8c-895658d340aa',
            ],
            'slug' => 'ecology-in-mouscron',
            'membersCount' => 2,
        ]);
    }

    public function testShowFailure(): void
    {
        $this->authenticateActor('emmanuel@mobilisation-eu.localhost');

        $this->client->request('GET', '/api/group/baa530cc-1ade-4275-9e8c-59696bc07c0e');
        $this->assertNotFoundResponse();
    }
}
