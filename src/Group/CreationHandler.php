<?php

namespace App\Group;

use App\Entity\Group;
use App\Mailer\Mailer;
use App\Repository\GroupRepository;
use Doctrine\ORM\EntityManagerInterface;

class CreationHandler
{
    private $entityManager;
    private $mailer;
    private $groupRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        Mailer $mailer,
        GroupRepository $groupRepository
    ) {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
        $this->groupRepository = $groupRepository;
    }

    public function create(Group $group): void
    {
        $this->entityManager->persist($group);
        $this->entityManager->flush();

        $this->mailer->sendGroupCreatedMail($group);
    }
}
