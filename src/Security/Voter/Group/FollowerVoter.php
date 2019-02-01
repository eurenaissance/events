<?php

namespace App\Security\Voter\Group;

use App\Entity\Actor;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class FollowerVoter extends Voter
{
    private const ROLE = 'IS_GROUP_FOLLOWER';

    protected function supports($attribute, $subject)
    {
        return self::ROLE === $attribute && null === $subject;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        if (!$user instanceof Actor) {
            return false;
        }

        return $user->isFollower();
    }
}
