<?php

namespace App\Setup;

use App\Entity\Configuration;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConfigurationSetupStep implements SetupStepInterface
{
    private $manager;

    public function __construct(EntityManagerInterface $em)
    {
        $this->manager = $em;
    }

    public function getOrder(): int
    {
        return 1;
    }

    public function getName(): string
    {
        return 'Creating default configuration';
    }

    public function execute(OutputInterface $output): void
    {
        $configuration = new Configuration();
        $configuration->setPartyName('Your party');
        $configuration->setPartyLogo('fixtures/logo/default.jpg');
        $configuration->setPartyWebsite('https://your-party.com');
        $configuration->setColorPrimary('6f80ff');
        $configuration->setFontPrimary('Roboto Slab');
        $configuration->setFontMono('Roboto Mono');
        $configuration->setFavicon('fixtures/logo/favicon.png');
        $configuration->setMetaDescription('Your party slogan');
        $configuration->setMetaImage('fixtures/home/default.jpg');
        $configuration->setHomeImage('fixtures/home/default.jpg');
        $configuration->setHomeIntroSubtitle('Don\'t wait for a better Europe.');
        $configuration->setHomeIntroTitle('Change it!');
        $configuration->setHomeIntroButton('I\'m in!');
        $configuration->setHomeDisplayMap(false);
        $configuration->setEmailSender('contact@your-party.com');
        $configuration->setEmailContact('contact@your-party.com');

        $this->manager->persist($configuration);
        $this->manager->flush();

        $output->writeln('Created');
    }
}
