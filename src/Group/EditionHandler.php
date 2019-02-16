<?php

namespace App\Group;

use App\Entity\Group;
use App\Repository\GroupRepository;
use Doctrine\ORM\EntityManagerInterface;

class EditionHandler
{
    private $entityManager;
    private $groupRepository;

    public function __construct(EntityManagerInterface $entityManager, GroupRepository $groupRepository)
    {
        $this->entityManager = $entityManager;
        $this->groupRepository = $groupRepository;
    }

    public function edit(Group $group): void
    {
        $this->entityManager->persist($group);
        $this->entityManager->flush();
    }
}
