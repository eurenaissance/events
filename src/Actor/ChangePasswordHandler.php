<?php

namespace App\Actor;

use App\Entity\Actor;
use App\Mailer\Mailer;
use Doctrine\ORM\EntityManagerInterface;

class ChangePasswordHandler
{
    private $entityManager;
    private $mailer;

    public function __construct(EntityManagerInterface $entityManager, Mailer $mailer)
    {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
    }

    public function change(Actor $actor): void
    {
        $this->entityManager->flush();

        $this->mailer->sendActorPasswordChangedMail($actor);
    }
}
