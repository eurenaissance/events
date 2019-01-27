<?php

namespace App\DataFixtures;

use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;

class CityFixtures extends Fixture
{
    public const CITY_01_UUID = 'e8b15645-8df6-4d15-8555-94922199e8bd';
    public const CITY_02_UUID = '83cd3d14-fc47-4436-b382-cbb0df910a43';
    public const CITY_03_UUID = '3a3a1a1c-f110-4d42-bbf1-ad6a2ebf096f';
    public const CITY_04_UUID = '5b017472-e001-41f3-8b0e-f77c140b26ed';
    public const CITY_05_UUID = 'c79b2dd0-6380-467b-8b26-8cb0443a84cb';
    public const CITY_06_UUID = '61a309b5-6285-4439-8dc5-aa9b78574622';
    public const CITY_07_UUID = 'd1d0b957-eb03-4c56-97ca-f92269995a54';
    public const CITY_08_UUID = '955e1e01-468a-4b84-9ab5-25ac6bf65c8e';

    public function load(ObjectManager $manager)
    {
        // Simple case
        $city1 = $this->create(self::CITY_01_UUID, 'FR', 'Paris', '75000', 48.8534, 2.3488);
        $city2 = $this->create(self::CITY_02_UUID, 'FR', 'Bois-Colombes', '92270', 48.9194, 2.2748);

        // Multiple cities for a single ZIP code
        $city3 = $this->create(self::CITY_03_UUID, 'FR', 'Villamée', '35420', 48.4602, -1.219);
        $city4 = $this->create(self::CITY_04_UUID, 'FR', 'Saint-Georges-de-Reintembault', '35420', 48.5074, -1.2433);
        $city5 = $this->create(self::CITY_05_UUID, 'FR', 'Louvigné-du-Désert', '35420', 48.4805, -1.1254);

        // Ireland ZIP codes are only the beginning of the actual ZIP code
        $city6 = $this->create(self::CITY_06_UUID, 'IE', 'Dublin 8', 'D08', 53.3346, -6.2733);

        $city7 = $this->create(self::CITY_07_UUID, 'FR', 'Clichy', '92110', 48.9002, 2.3095);
        $city8 = $this->create(self::CITY_08_UUID, 'FR', 'Nice', '06000', 43.7031, 7.2661);

        $cities = [
            // AT #^\d{4}$#
            ['AT', 'Lieseregg', '9851', 46.8333, 13.5],
            ['AT', 'Kras', '9851', 46.9026, 13.5034],
            // BE #^\d{4}$#
            ['BE', 'Westerlo', '2260', 51.0833, 4.9167],
            ['BE', 'Westerlo Tongerlo', '2260', 51.1, 4.8889],
            // BG #^\d{4}$#
            ['BG', 'Източник / Iztochnik', '5300', 42.8667, 25.3833],
            ['BG', 'Гръблевци / Grublevci', '5300', 42.9333, 25.3167],
            // CZ #^\d{3}\s\d{2}$#
            ['CZ', 'Krásný Les', '403 37', 50.7333, 13.9833],
            ['CZ', 'Lípa', '582 57', 49.55, 15.55],
            // DE #^\d{5}$#
            ['DE', 'Hettenshausen', '85276', 48.5, 11.5],
            ['DE', 'Wolnzach', '85283', 48.6038, 11.6257],
            // DK #^\d{4}$#
            ['DK', 'Morud', '5462', 55.4481, 10.1896],
            ['DK', 'Rømø', '6792', 55.1132, 8.5428],
            // ES #^\d{5}$#
            ['ES', 'Carasa', '39762', 43.3712, -3.4611],
            ['ES', 'Rada', '39764', 43.3675, -3.4924],
            // FI #^\d{5}$#
            ['FI', 'Ikkala', '03810', 60.4869, 24.108],
            ['FI', 'Harju', '45330', 60.93, 26.6957],
            // FR #^\d{5}$#
            ['FR', 'Fleury-la-Vallée', '89113', 47.8667, 3.4491],
            ['FR', 'Roquefort-les-Pins', '06330', 43.6727, 7.0565],
            // HR #^\d{5}$#
            ['HR', 'Donji Vidovec', '40327', 46.3292, 16.7867],
            ['HR', 'Jasenak	Karlovačka', '47314', 45.2328, 15.0442],
            // HU #^\d{4}$#
            ['HU', 'Gödre', '7386', 46.2833, 17.9833],
            ['HU', 'Öreglak', '8697', 46.6, 17.6167],
            // IE #^[A-Z]\d{2}$#
            ['IE', 'Ballina', 'F26', 54.1167, -9.1667],
            ['IE', 'Crookstown', 'P14', 53.0153, -6.8106],
            // IT #^\d{5}$#
            ['IT', 'Vernante', '12019', 44.2445, 7.5345],
            ['IT', 'Pieve Fosciana', '55036', 44.1307, 10.4095],
            // LT #^\d{5}$#
            ['LT', 'Veriškių k.', '15019', 54.85, 25.4833],
            ['LT', 'Kėkštynės k.', '54073', 55.1167, 23.9667],
            // LU #^L\-\d{4}$#
            ['LU', 'Hobscheid', 'L-8372', 49.6872, 5.9145],
            ['LU', 'Roeser', 'L-3398', 49.5448, 6.1507],
            // LV #^LV\-\d{4}$#
            ['LV', 'Ozolsala', 'LV-4561', 57.062, 27.3037],
            ['LV', 'Slostova', 'LV-4594', 56.9485, 27.5311],
            // MT #^[A-Z]{3}$#
            ['MT', 'Safi', 'SFI', 35.8347, 14.4917],
            ['MT', 'Iklin', 'IKL', 35.9097, 14.4556],
            // NL #^\d{4}$#
            ['NL', 'Geesbrug', '7917', 52.729, 6.6278],
            ['NL', 'Leur', '6615', 51.8227, 5.6985],
            // PL #^\d{2}\-\d{3}$#
            ['PL', 'Osieczów', '59-724', 51.2975, 15.433],
            ['PL', 'Polna', '33-331', 49.6731, 20.9942],
            // PT #^\d{4}\-\d{3}$#
            ['PT', 'Cabeço Grande', '3750-045', 40.5166, -8.3904],
            ['PT', 'Beirã', '7330-998', 39.405, -7.3631],
            // RO #^\d{6}$#
            ['RO', 'Scărişoara', '327146', 45.0302, 22.5466],
            ['RO', 'Bengeşti', '217067', 45.0667, 23.6],
            // SE #^\d{3}\s\d{2}$#
            ['SE', 'Nissafors', '335 92', 57.4, 13.6333],
            ['SE', 'Våxtorp', '312 75', 56.4333, 13.1],
            // SI #^\d{4}$#
            ['SI', 'Markovci', '2281', 46.3833, 15.95],
            ['SI', 'Naklo', '4202', 46.2728, 14.3172],
        ];

        foreach ($cities as $city) {
            $manager->persist(new City(Uuid::uuid4(), ...$city));
        }

        $this->setReference('city-1', $city1);
        $this->setReference('city-2', $city2);
        $this->setReference('city-3', $city3);
        $this->setReference('city-4', $city4);
        $this->setReference('city-5', $city5);
        $this->setReference('city-6', $city6);
        $this->setReference('city-7', $city7);
        $this->setReference('city-8', $city8);

        $manager->persist($city1);
        $manager->persist($city2);
        $manager->persist($city3);
        $manager->persist($city4);
        $manager->persist($city5);
        $manager->persist($city6);
        $manager->persist($city7);
        $manager->persist($city8);

        $manager->flush();
    }

    private function create(
        string $uuid,
        string $country,
        string $name,
        string $zipCode,
        float $latitude,
        float $longitude
    ): City {
        return new City(Uuid::fromString($uuid), $country, $name, $zipCode, $latitude, $longitude);
    }
}
