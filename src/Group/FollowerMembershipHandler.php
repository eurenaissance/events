<?php

namespace App\Group;

use App\Entity\Actor;
use App\Entity\Group;
use App\Entity\Group\FollowerMembership;
use App\Mailer\Mailer;
use Doctrine\ORM\EntityManagerInterface;

class FollowerMembershipHandler
{
    private $entityManager;
    private $mailer;

    public function __construct(EntityManagerInterface $entityManager, Mailer $mailer)
    {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
    }

    public function follow(Actor $actor, Group $group): void
    {
        /** @var FollowerMembership $membership */
        $membership = FollowerMembership::create($actor, $group);

        $this->entityManager->persist($membership);
        $this->entityManager->flush();

        $this->mailer->sendGroupNewFollowerMail($membership);
    }

    public function unfollow(Actor $actor, Group $group): void
    {
        $membership = $actor->getFollowerMembership($group);

        $this->entityManager->remove($membership);
        $this->entityManager->flush();
    }
}
