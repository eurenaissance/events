<?php

namespace App\Configuration;

use App\Entity\Configuration;
use App\Repository\ConfigurationRepository;

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

    public function getPartyName(): ?string
    {
        $this->prepareData();

        return $this->data->getPartyName();
    }

    public function getPartyLogo(): ?string
    {
        $this->prepareData();

        return $this->data->getPartyLogo();
    }

    public function getPartyWebsite(): ?string
    {
        $this->prepareData();

        return $this->data->getPartyWebsite();
    }

    public function getColorPrimary(): ?string
    {
        $this->prepareData();

        return $this->data->getColorPrimary();
    }

    public function getFontPrimary(): ?string
    {
        $this->prepareData();

        return $this->data->getFontPrimary();
    }

    public function getFontMono(): ?string
    {
        $this->prepareData();

        return $this->data->getFontMono();
    }

    public function getMetaDescription(): ?string
    {
        $this->prepareData();

        return $this->data->getMetaDescription();
    }

    public function getMetaImage(): ?string
    {
        $this->prepareData();

        return $this->data->getMetaImage();
    }

    public function getMetaGoogleAnalyticsId(): ?string
    {
        $this->prepareData();

        return $this->data->getMetaGoogleAnalyticsId();
    }

    public function getHomePicture(): ?string
    {
        $this->prepareData();

        return $this->data->getHomePicture();
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
        $configuration->setPartyWebsite('https://events.your-party.com');
        $configuration->setColorPrimary('6f80ff');
        $configuration->setFontPrimary('Roboto Slab');
        $configuration->setFontMono('Roboto Mono');
        $configuration->setMetaDescription('Your party slogan');
        $configuration->setMetaImage('fixtures/home/default.jpg');
        $configuration->setHomePicture('fixtures/home/default.jpg');

        $this->data = $configuration;
    }
}
