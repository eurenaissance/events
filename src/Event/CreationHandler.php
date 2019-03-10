<?php

namespace App\Event;

use App\Entity\Event;
use App\Mailer\Mailer;
use Doctrine\ORM\EntityManagerInterface;

class CreationHandler
{
    private $entityManager;
    private $mailer;

    public function __construct(EntityManagerInterface $entityManager, Mailer $mailer)
    {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
    }

    public function create(Event $event): void
    {
        $this->entityManager->persist($event);
        $this->entityManager->flush();

        $this->mailer->sendEventCreatedMail($event);
    }
}
