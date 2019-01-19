<?php

namespace App\Actor;

use App\Entity\Actor;
use App\Mailer\Mailer;
use Doctrine\ORM\EntityManagerInterface;

class RegistrationHandler
{
    private $entityManager;
    private $mailer;

    public function __construct(EntityManagerInterface $entityManager, Mailer $mailer)
    {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
    }

    public function register(Actor $actor): void
    {
        $this->entityManager->persist($actor);
        $this->entityManager->flush();

        $this->mailer->sendActorRegistrationMail($actor);
    }
}
