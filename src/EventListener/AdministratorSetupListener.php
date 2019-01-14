<?php

namespace App\EventListener;

use App\Repository\AdministratorRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Routing\RouterInterface;

class AdministratorSetupListener
{
    private $administratorRepository;
    private $router;

    public function __construct(AdministratorRepository $administratorRepository, RouterInterface $router)
    {
        $this->administratorRepository = $administratorRepository;
        $this->router = $router;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if ('app_admin_setup' === $event->getRequest()->get('_route')) {
            return;
        }

        if (0 === $this->administratorRepository->countAdministrators()) {
            $event->setResponse(new RedirectResponse($this->router->generate('app_admin_setup')));
        }
    }
}
