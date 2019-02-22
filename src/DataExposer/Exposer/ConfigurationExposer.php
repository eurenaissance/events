<?php

namespace App\DataExposer\Exposer;

use App\DataExposer\DataExposer;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ConfigurationExposer implements EventSubscriberInterface
{
    private $exposer;

    public function __construct(DataExposer $exposer)
    {
        $this->exposer = $exposer;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => 'expose',
        ];
    }

    public function expose(FilterControllerEvent $event)
    {
        $this->exposer->expose('locale', $event->getRequest()->getLocale());
    }
}
