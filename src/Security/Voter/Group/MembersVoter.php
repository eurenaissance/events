<?php

namespace App\Security\Voter\Group;

use App\Entity\Actor;
use App\Entity\Group;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class MembersVoter extends Voter
{
    private const ROLE = 'GROUP_MEMBERS';

    protected function supports($attribute, $subject)
    {
        return self::ROLE === $attribute && $subject instanceof Group;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        if (!$user instanceof Actor) {
            return false;
        }

        return $subject->isApproved() && ($user->isAnimatorOf($subject) || $user->isCoAnimatorOf($subject));
    }
}
