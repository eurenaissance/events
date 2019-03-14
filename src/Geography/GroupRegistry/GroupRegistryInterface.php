<?php

namespace App\Geography\GroupRegistry;

use App\Entity\Actor;

interface GroupRegistryInterface
{
    public function findGroups(Actor $user, string $term): array;
}
