<?php

namespace App\EventSubscriber;

use App\Entity\Administrator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Security;

class EntityRefusedSubscriber implements EventSubscriberInterface
{
    private $security;
    private $entityManager;

    public function __construct(Security $security, EntityManagerInterface $entityManager)
    {
        $this->security = $security;
        $this->entityManager = $entityManager;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => [
                ['onKernelController', 10],
            ],
        ];
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        if (!$user = $this->security->getUser()) {
            return;
        }

        if (!$user instanceof Administrator) {
            return;
        }

        $filters = $this->entityManager->getFilters();

        if ($filters->isEnabled('refused')) {
            $filters->disable('refused');
        }
    }
}
