<?php

namespace App\Twig;

use Symfony\Component\Intl\Intl;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class I18nExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('country', [$this, 'getCountryName']),
        ];
    }

    public function getCountryName(string $countryCode): string
    {
        return Intl::getRegionBundle()->getCountryName($countryCode) ?? $countryCode;
    }
}
