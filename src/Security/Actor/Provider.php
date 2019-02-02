<?php

namespace App\Security\Actor;

use App\Entity\Actor;
use App\Repository\ActorRepository;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class Provider implements UserProviderInterface
{
    private $actorRepository;

    public function __construct(ActorRepository $actorRepository)
    {
        $this->actorRepository = $actorRepository;
    }

    public function loadUserByUsername($username)
    {
        if (!$user = $this->actorRepository->loadActor($username)) {
            throw new UsernameNotFoundException();
        }

        return $user;
    }

    public function refreshUser(UserInterface $user)
    {
        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return Actor::class === $class;
    }
}
