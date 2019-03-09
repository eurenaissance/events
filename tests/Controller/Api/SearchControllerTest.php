<?php

namespace Test\App\Controller\Api;

use App\DataFixtures\CityFixtures;
use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class SearchControllerTest extends HttpTestCase
{
    public function provideCitySearch(): iterable
    {
        yield ['Par', ['Paris']];
        yield ['Saint', ['Saint-Georges-de-Reintembault', 'Saint-Herblain']];
    }

    /**
     * @dataProvider provideCitySearch
     */
    public function testCitySearch(string $term, array $expectedResults): void
    {
        $this->client->request('GET', '/api/search/cities?q='.$term);
        $this->assertJsonResponse(array_map(function (string $city) {
            return ['name' => $city, 'uuid' => '@uuid@'];
        }, $expectedResults));
    }

    public function provideEventSearch(): iterable
    {
        yield [CityFixtures::CITY_01_UUID, '', [
            'First event in Paris',
            'Second event in Paris',
            'Event in Clichy',
        ]];

        yield [CityFixtures::CITY_02_UUID, '', [
            'Event in Clichy',
            'First event in Paris',
            'Second event in Paris',
        ]];

        yield [CityFixtures::CITY_02_UUID, 'paris', [
            'First event in Paris',
            'Second event in Paris',
        ]];

        yield [CityFixtures::CITY_02_UUID, 'second paris', [
            'Second event in Paris',
            'First event in Paris',
        ]];

        yield [CityFixtures::CITY_05_UUID, '', [
            'Event in Nice',
        ]];
    }

    /**
     * @dataProvider provideEventSearch
     */
    public function testEventSearch(string $cityUuid, string $term, array $expectedResults): void
    {
        $this->client->request('GET', '/api/search/events?c='.$cityUuid.'&q='.$term);

        $this->assertResponseSuccessFul();
        $this->assertJson($this->client->getResponse()->getContent());

        $content = \GuzzleHttp\json_decode($this->client->getResponse()->getContent());
        $names = array_column($content, 'name');

        $this->assertSame($expectedResults, $names);
    }
}
