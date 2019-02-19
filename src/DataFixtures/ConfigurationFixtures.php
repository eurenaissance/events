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
        $configuration->setFavicon('fixtures/logo/favicon.png');
        $configuration->setMetaDescription('Mobilisation for Europe');
        $configuration->setMetaGoogleAnalyticsId('FOOBAR');
        $configuration->setMetaImage('fixtures/home/default.jpg');
        $configuration->setHomeImage('fixtures/home/default.jpg');
        $configuration->setHomeIntroSubtitle('Don\'t wait for a better Europe.');
        $configuration->setHomeIntroTitle('Change it!');
        $configuration->setHomeIntroButton('I\'m in!');
        $configuration->setHomeDisplayMap(true);
        $configuration->setEmailSender('contact@mobilisation-eu.localhost');
        $configuration->setEmailContact('contact@mobilisation-eu.localhost');

        $manager->persist($configuration);
        $manager->flush();
    }
}
