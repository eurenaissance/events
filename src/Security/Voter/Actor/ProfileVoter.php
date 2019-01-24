<?php

namespace App\Security\Voter\Actor;

use App\Entity\Actor;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class ProfileVoter extends Voter
{
    private const ROLE = 'ACTOR_PROFILE';

    protected function supports($attribute, $subject)
    {
        return self::ROLE === $attribute && null === $subject;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        return $token->getUser() instanceof Actor;
    }
}
