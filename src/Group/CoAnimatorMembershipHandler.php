<?php

namespace App\Group;

use App\Entity\Actor;
use App\Entity\Group;
use App\Entity\Group\FollowerMembership;
use App\Entity\Group\CoAnimatorMembership;
use App\Mailer\Mailer;
use Doctrine\ORM\EntityManagerInterface;

class CoAnimatorMembershipHandler
{
    private $entityManager;
    private $mailer;

    public function __construct(EntityManagerInterface $entityManager, Mailer $mailer)
    {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
    }

    public function promote(Actor $actor, Group $group): void
    {
        $followerMembership = $actor->getFollowerMembership($group);
        /** @var CoAnimatorMembership $coAnimatorMembership */
        $coAnimatorMembership = CoAnimatorMembership::create($actor, $group);

        $this->entityManager->remove($followerMembership);
        $this->entityManager->persist($coAnimatorMembership);
        $this->entityManager->flush();

        $this->mailer->sendGroupNewCoAnimatorMail($coAnimatorMembership);
    }

    public function demote(Actor $actor, Group $group): void
    {
        $coAnimatorMembership = $actor->getCoAnimatorMembership($group);
        /** @var FollowerMembership $followerMembership */
        $followerMembership = FollowerMembership::create($actor, $group);

        $this->entityManager->remove($coAnimatorMembership);
        $this->entityManager->persist($followerMembership);
        $this->entityManager->flush();
    }
}
