<?php

namespace App\Security\Voter\Event;

use App\Entity\Actor;
use App\Entity\Event;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class EditVoter extends Voter
{
    private const ROLE = 'EVENT_EDIT';

    protected function supports($attribute, $subject)
    {
        return self::ROLE === $attribute && $subject instanceof Event;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        if (!$user instanceof Actor) {
            return false;
        }

        return $subject->getCreator()->isEqualTo($user);
    }
}
