<?php

namespace App\Actor;

use App\Entity\Actor;
use Doctrine\ORM\EntityManagerInterface;

class ChangePasswordHandler
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function change(Actor $actor, string $plainPassword): void
    {
        $actor->setPassword($encodedPassword);

        $this->entityManager->flush();
    }
}
