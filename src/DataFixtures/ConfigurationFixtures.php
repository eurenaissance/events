<?php

namespace App\DataFixtures;

use App\Entity\Configuration;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ConfigurationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $configuration = new Configuration();
        $configuration->setPartyName('MobilisationEU');
        $configuration->setPartyLogo('fixtures/logo/default.jpg');
        $configuration->setPartyWebsite('https://mobilisation-eu.localhost');
        $configuration->setColorPrimary('6f80ff');
        $configuration->setFontPrimary('Roboto Slab');
        $configuration->setFontMono('Roboto Mono');
        $configuration->setMetaDescription('Mobilisation for Europe');
        $configuration->setMetaGoogleAnalyticsId('FOOBAR');
        $configuration->setMetaImage('fixtures/home/default.jpg');
        $configuration->setHomePicture('fixtures/home/default.jpg');

        $manager->persist($configuration);
        $manager->flush();
    }
}
