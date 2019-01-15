<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Role\SwitchUserRole;
use Symfony\Component\Security\Core\User\UserInterface;

final class AuthenticationUtils
{
    private $tokenStorage;
    private $session;

    public function __construct(TokenStorageInterface $tokenStorage, SessionInterface $session)
    {
        $this->tokenStorage = $tokenStorage;
        $this->session = $session;
    }

    public function getImpersonatingUser(): ?UserInterface
    {
        foreach ($this->tokenStorage->getToken()->getRoles() as $role) {
            if ($role instanceof SwitchUserRole) {
                return $role->getSource()->getUser();
            }
        }

        return null;
    }

    public function authenticateAdministrator(UserInterface $user): void
    {
        $this->doAuthenticateUser($user, 'app_administrator_provider');
    }

    public function authenticateActor(UserInterface $user): void
    {
        $this->doAuthenticateUser($user, 'app_actor_provider');
    }

    private function doAuthenticateUser(UserInterface $user, string $providerKey): void
    {
        $token = new UsernamePasswordToken($user, '', $providerKey, $user->getRoles());

        $this->tokenStorage->setToken($token);
        $this->session->set('_security_main', serialize($token));
    }
}
