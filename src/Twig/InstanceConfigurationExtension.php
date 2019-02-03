<?php

namespace App\Twig;

use App\Configuration\InstanceConfiguration;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class InstanceConfigurationExtension extends AbstractExtension
{
    private $instanceConfiguration;

    public function __construct(InstanceConfiguration $instanceConfiguration)
    {
        $this->instanceConfiguration = $instanceConfiguration;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('get_instance_configuration', [$this, 'getInstanceConfiguration']),
        ];
    }

    public function getInstanceConfiguration(): InstanceConfiguration
    {
        return $this->instanceConfiguration;
    }
}
