<?php

namespace App\Security\User;

use Scheb\TwoFactorBundle\Model\Google\TwoFactorInterface;

interface AdministratorInterface extends UserPasswordInterface, TwoFactorInterface
{
}
