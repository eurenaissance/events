<?php

namespace App\Configuration;

use App\Entity\Configuration;
use App\Repository\ConfigurationRepository;

/**
 * @method getPartyName
 * @method getPartyLogo
 * @method getPartyWebsite
 * @method getColorPrimary
 * @method getFontPrimary
 * @method getFontMono
 * @method getFavicon
 * @method getMetaDescription
 * @method getMetaImage
 * @method getMetaGoogleAnalyticsId
 * @method getHomeImage
 * @method getHomeIntroSubtitle
 * @method getHomeIntroTitle
 * @method getHomeIntroButton
 * @method getHomeDisplayMap
 * @method getEmailSender
 * @method getEmailSenderName
 * @method getEmailContact
 */
class InstanceConfiguration
{
    private $repository;

    /**
     * @var Configuration|null Cached configuration data.
     */
    private $data;

    public function __construct(ConfigurationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __call($name, $arguments)
    {
        $this->prepareData();

        return $this->data->{'get'.ucfirst($name)}();
    }

    private function prepareData()
    {
        if ($this->data) {
            return;
        }

        if ($this->data = $this->repository->findOneBy([])) {
            return;
        }

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

        $this->data = $configuration;
    }
}
