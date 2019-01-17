<?php

namespace App\Actor;

use App\Entity\Actor;
use Doctrine\ORM\EntityManagerInterface;

class RegistrationHandler
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function register(Actor $actor): void
    {
        $this->entityManager->persist($actor);
        $this->entityManager->flush();
    }
}
