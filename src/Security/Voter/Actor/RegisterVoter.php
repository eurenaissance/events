<?php

namespace App\Security\Voter\Actor;

use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class RegisterVoter extends Voter
{
    private const ROLE = 'ACTOR_REGISTER';

    protected function supports($attribute, $subject)
    {
        return self::ROLE === $attribute && null === $subject;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        return $token instanceof AnonymousToken;
    }
}
