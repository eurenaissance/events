<?php

namespace Test\App\Controller\Api;

use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class SearchControllerTest extends HttpTestCase
{
    public function provideValidTerms(): iterable
    {
        yield ['Par', ['Paris']];
        yield ['Saint', ['Saint-Herblain', 'Saint-Georges-de-Reintembault']];
    }

    /**
     * @dataProvider provideValidTerms
     */
    public function testValidTerm(string $term, array $expectedResults): void
    {
        $this->client->request('GET', '/api/search/cities?q='.$term);
        $this->assertJsonResponse(array_map(function (string $city) {
            return ['name' => $city, 'uuid' => '@uuid@'];
        }, $expectedResults));
    }
}
