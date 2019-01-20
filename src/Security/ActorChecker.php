<?php

namespace App\Security;

use App\Entity\Actor;
use App\Security\Exception\ActorNotConfirmedException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class ActorChecker implements UserCheckerInterface
{
    private $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function checkPreAuth(UserInterface $user)
    {
    }

    public function checkPostAuth(UserInterface $user)
    {
        if (!$user instanceof Actor) {
            return;
        }

        if (!$user->isConfirmed()) {
            throw new ActorNotConfirmedException($this->generateResendConfirmationUrl());
        }
    }

    private function generateResendConfirmationUrl(): string
    {
        return $this->urlGenerator->generate('app_resend_confirmation_request');
    }
}
