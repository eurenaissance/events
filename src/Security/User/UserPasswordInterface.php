<?php

namespace App\Security\User;

use Symfony\Component\Security\Core\User\UserInterface;

interface UserPasswordInterface extends UserInterface
{
    public function changePassword(string $encodedPassword): void;
}
