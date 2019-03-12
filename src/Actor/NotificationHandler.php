<?php

namespace App\Actor;

use App\Entity\Actor;
use Doctrine\ORM\EntityManagerInterface;

class NotificationHandler
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function changeNotification(Actor $actor, bool $notificationEnabled): void
    {
        $actor->setNotificationEnabled($notificationEnabled);
        $this->entityManager->flush();
    }
}
