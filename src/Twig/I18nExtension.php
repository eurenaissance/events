<?php

namespace App\Twig;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Intl\Intl;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class I18nExtension extends AbstractExtension
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function getFilters()
    {
        return [
            new TwigFilter('country', [$this, 'getCountryName']),
        ];
    }

    public function getCountryName(string $countryCode): string
    {
        if ($request = $this->requestStack->getCurrentRequest()) {
            return Intl::getRegionBundle()->getCountryName($countryCode, $request->getLocale());
        }

        return strtoupper($countryCode);
    }
}
