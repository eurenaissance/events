<?php

namespace App\Security\Voter\Group;

use App\Entity\Actor;
use App\Entity\Group;
use App\Repository\GroupRepository;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class FollowVoter extends Voter
{
    private const ROLE = 'GROUP_FOLLOW';

    private $groupRepository;

    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

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

        if ($user->isAnimatorOf($subject)) {
            return false;
        }

        return !$user->isFollowerOf($subject);
    }
}
