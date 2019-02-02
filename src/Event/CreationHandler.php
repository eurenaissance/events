<?php

namespace App\Event;

use App\Entity\Event;
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

    public function create(Event $event): void
    {
        $this->entityManager->persist($event);
        $this->entityManager->flush();

        $this->mailer->sendEventCreatedMail($event);
    }
}
