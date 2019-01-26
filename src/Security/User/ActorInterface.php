<?php

namespace App\Security\User;

use Symfony\Component\Security\Core\User\EquatableInterface;

interface ActorInterface extends UserPasswordInterface, EquatableInterface
{
}
