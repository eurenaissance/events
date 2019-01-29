<?php

namespace App\EventSubscriber;

use App\Repository\AdministratorRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Routing\RouterInterface;

class AdministratorSetupSubscriber implements EventSubscriberInterface
{
    private $administratorRepository;
    private $router;

    public function __construct(AdministratorRepository $administratorRepository, RouterInterface $router)
    {
        $this->administratorRepository = $administratorRepository;
        $this->router = $router;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => [['onKernelRequest', 30]],
        ];
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if ('app_admin_setup' === $event->getRequest()->get('_route')) {
            return;
        }

        if (!$this->administratorRepository->hasAdministrator()) {
            $event->setResponse(new RedirectResponse($this->router->generate('app_admin_setup')));
        }
    }
}
