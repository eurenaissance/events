<?php

namespace App\Actor;

use App\Entity\Actor;
use App\Mailer\Mailer;
use Doctrine\ORM\EntityManagerInterface;

class ProfileHandler
{
    private $entityManager;
    private $mailer;

    public function __construct(EntityManagerInterface $entityManager, Mailer $mailer)
    {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
    }

    public function changePassword(Actor $actor): void
    {
        $this->entityManager->flush();

        $this->mailer->sendActorPasswordChangedMail($actor);
    }
}
