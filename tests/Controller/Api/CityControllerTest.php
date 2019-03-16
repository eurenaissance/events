<?php

namespace Test\App\Controller\Api;

use App\DataFixtures\CityFixtures;
use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class CityControllerTest extends HttpTestCase
{
    public function provideAutocompleteSuccess(): iterable
    {
        yield ['FR', '75000', ['Paris']];
        yield ['FR', '75 000', ['Paris']];
        yield ['FR', '92271', []];
        yield ['ZZ', '12345', []];
        yield ['FR', '35420', [
            'Louvigné-du-Désert',
            'Saint-Georges-de-Reintembault',
            'Villamée',
        ]];

        yield ['AT', '9851', ['Kras', 'Lieseregg']];
        yield ['AT', '985199', ['Kras', 'Lieseregg']];
        yield ['BE', '2260', ['Westerlo', 'Westerlo Tongerlo']];
        yield ['BE', ' 2260 99', ['Westerlo', 'Westerlo Tongerlo']];
        yield ['BG', '5300', ['Гръблевци / Grublevci', 'Източник / Iztochnik']];
        yield ['BG', ' 5 3 0 0 9 9 ', ['Гръблевци / Grublevci', 'Източник / Iztochnik']];
        yield ['CZ', '403 37', ['Krásný Les']];
        yield ['CZ', '5825799', ['Lípa']];
        yield ['DE', '85276', ['Hettenshausen']];
        yield ['DE', '8528399', ['Wolnzach']];
        yield ['DK', '5462', ['Morud']];
        yield ['DK', ' 6792 -9 -9 ', ['Rømø']];
        yield ['ES', '39762', ['Carasa']];
        yield ['ES', '39 764', ['Rada']];
        yield ['FI', '03810', ['Ikkala']];
        yield ['FI', ' 45 330 9', ['Harju']];
        yield ['FR', '89113', ['Fleury-la-Vallée']];
        yield ['FR', '06 330', ['Roquefort-les-Pins']];
        yield ['HR', '40327', ['Donji Vidovec']];
        yield ['HR', '47--314 ', ['Jasenak	Karlovačka']];
        yield ['HU', '7386', ['Gödre']];
        yield ['HU', '-86  --  97 -- ', ['Öreglak']];
        yield ['IE', 'D08', ['Dublin 8']];
        yield ['IE', 'F 26 VN56', ['Ballina']];
        yield ['IT', '12019', ['Vernante']];
        yield ['IT', '55 03 6', ['Pieve Fosciana']];
        yield ['LT', '15019', ['Veriškių k.']];
        yield ['LT', '54 073', ['Kėkštynės k.']];
        yield ['LU', 'L-8372', ['Hobscheid']];
        yield ['LU', 'L8372', ['Hobscheid']];
        yield ['LU', 'L 8372', ['Hobscheid']];
        yield ['LU', 'L -8372', ['Hobscheid']];
        yield ['LU', 'L- 8372', ['Hobscheid']];
        yield ['LU', 'L - 8372', ['Hobscheid']];
        yield ['LU', 'L - 33 98', ['Roeser']];
        yield ['LV', 'LV-4561', ['Ozolsala']];
        yield ['LV', 'LV - 45 94', ['Slostova']];
        yield ['MT', 'SFI', ['Safi']];
        yield ['MT', 'I K L', ['Iklin']];
        yield ['NL', '7917', ['Geesbrug']];
        yield ['NL', '66 15', ['Leur']];
        yield ['PL', '59-724', ['Osieczów']];
        yield ['PL', '33 - 331', ['Polna']];
        yield ['PT', '3750-045', ['Cabeço Grande']];
        yield ['PT', '73 3099 8', ['Beirã']];
        yield ['RO', '327146', ['Scărişoara']];
        yield ['RO', '21 70 67', ['Bengeşti']];
        yield ['SE', '335 92', ['Nissafors']];
        yield ['SE', '31275', ['Våxtorp']];
        yield ['SI', '2281', ['Markovci']];
        yield ['SI', '42-02', ['Naklo']];
    }

    /**
     * @dataProvider provideAutocompleteSuccess
     */
    public function testAutocompleteSuccess(string $country, string $zipCode, array $expectedCities): void
    {
        $this->client->request('GET', '/api/cities/autocomplete/'.$country.'/'.$zipCode);
        $this->assertJsonResponse(array_map(function (string $city) {
            return ['name' => $city, 'uuid' => '@uuid@'];
        }, $expectedCities));
    }

    public function provideAutocompleteFailures(): iterable
    {
        yield ['FR2', '75000'];
        yield ['FRFR', '75000'];
        yield ['F R', '75000'];
        yield ['FR', 'wayTooLongToBeAValidZipCode'];
        yield [null, null];
        yield [null, '75000'];
        yield ['FR', null];
    }

    /**
     * @dataProvider provideAutocompleteFailures
     */
    public function testAutocompleteFailure(?string $country, ?string $zipCode): void
    {
        $this->client->request('GET', '/api/cities/autocomplete/'.$country.'/'.$zipCode);
        $this->assertNotFoundResponse();
    }

    public function testShowSuccess(): void
    {
        $this->client->request('GET', '/api/cities/'.CityFixtures::CITY_01_UUID);
        $this->assertJsonResponse(['name' => 'Paris', 'uuid' => 'e8b15645-8df6-4d15-8555-94922199e8bd']);
    }

    public function testShowFailure(): void
    {
        $this->client->request('GET', '/api/cities/98cccdf2-ced1-4e40-935d-94922199e8bd');
        $this->assertNotFoundResponse();
    }
}
