<?php

namespace App\Group;

use App\Entity\Group;
use App\Mailer\Mailer;
use Doctrine\ORM\EntityManagerInterface;

class AdministrationHandler
{
    private $entityManager;
    private $mailer;

    public function __construct(EntityManagerInterface $entityManager, Mailer $mailer)
    {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
    }

    public function approve(Group $group): void
    {
        $group->approve();

        $this->entityManager->flush();

        $this->mailer->sendGroupConfirmedMail($group);
    }

    public function refuse(Group $group): void
    {
        $group->refuse();

        $this->entityManager->flush();
    }
}
