<?php

namespace App\Security\Voter\Group;

use App\Entity\Actor;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class SearchVoter extends Voter
{
    private const ROLE = 'GROUP_SEARCH';

    protected function supports($attribute, $subject)
    {
        return self::ROLE === $attribute && null === $subject;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        return $user instanceof Actor;
    }
}
