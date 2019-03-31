<?php

namespace App\DataExposer\Exposer;

use App\DataExposer\DataExposer;
use App\Entity\Actor;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class ActorExposer implements EventSubscriberInterface
{
    private $exposer;
    private $tokenStorage;

    public function __construct(DataExposer $exposer, TokenStorageInterface $tokenStorage)
    {
        $this->exposer = $exposer;
        $this->tokenStorage = $tokenStorage;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => 'expose',
        ];
    }

    public function expose()
    {
        if (null === $token = $this->tokenStorage->getToken()) {
            return;
        }

        $user = $token->getUser();
        if (!$user instanceof Actor) {
            return;
        }

        $this->exposer->expose('user', [
            'uuid' => $user->getUuidAsString(),
            'city' => !$user->getCity() ? null : [
                'uuid' => $user->getCity()->getUuidAsString(),
                'name' => $user->getCity()->getName(),
            ],
        ]);
    }
}
