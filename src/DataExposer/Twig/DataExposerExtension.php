<?php

namespace App\DataExposer\Twig;

use App\DataExposer\DataExposer;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class DataExposerExtension extends AbstractExtension
{
    private $exposer;

    public function __construct(DataExposer $exposer)
    {
        $this->exposer = $exposer;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('data_exposer_json', [$this, 'createJsonExposedData'], ['is_safe' => ['html']]),
        ];
    }

    public function createJsonExposedData(array $additionalData = []): string
    {
        return json_encode(array_merge($additionalData, $this->exposer->getExposed()));
    }
}
