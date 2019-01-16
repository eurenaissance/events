<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Role\SwitchUserRole;
use Symfony\Component\Security\Core\User\UserInterface;

final class AuthenticationUtils
{
    private const ADMIN_PROVIDER_KEY = 'app_administrator_provider';
    private const ACTOR_PROVIDER_KEY = 'app_actor_provider';
    private const ADMIN_FIREWALL_NAME = 'admin';

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
        $this->doAuthenticateUser($user, self::ADMIN_PROVIDER_KEY);
    }

    public function authenticateActor(UserInterface $user): void
    {
        $this->doAuthenticateUser($user, self::ACTOR_PROVIDER_KEY);
    }

    private function doAuthenticateUser(UserInterface $user, string $providerKey): void
    {
        $token = new UsernamePasswordToken($user, '', $providerKey, $user->getRoles());

        $this->tokenStorage->setToken($token);
        $this->session->set(sprintf('_security_%s', self::ADMIN_FIREWALL_NAME), serialize($token));
    }
}
