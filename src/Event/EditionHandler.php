<?php

namespace App\Event;

use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;

class EditionHandler
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function edit(Event $event): void
    {
        $this->entityManager->flush();
    }
}
