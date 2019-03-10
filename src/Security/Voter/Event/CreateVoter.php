<?php

namespace App\Security\Voter\Event;

use App\Entity\Actor;
use App\Entity\Group;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class CreateVoter extends Voter
{
    private const ROLE = 'EVENT_CREATE';

    protected function supports($attribute, $subject)
    {
        return self::ROLE === $attribute;
    }

    /**
     * @param string         $attribute
     * @param Group          $subject
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        if (!$user instanceof Actor) {
            return false;
        }

        // If a group is given, check if the user can create an event for this group
        if ($subject instanceof Group) {
            return $subject->isApproved() && ($user->isAnimatorOf($subject) || $user->isCoAnimatorOf($subject));
        }

        // Otherwise, check if the user can create an event in general
        foreach ($user->getAnimatedGroups() as $group) {
            if ($group->isApproved() && ($user->isAnimatorOf($group) || $user->isCoAnimatorOf($group))) {
                return true;
            }
        }

        foreach ($user->getCoAnimatorMemberships() as $membership) {
            $group = $membership->getGroup();

            if ($group->isApproved() && ($user->isAnimatorOf($group) || $user->isCoAnimatorOf($group))) {
                return true;
            }
        }

        return false;
    }
}
