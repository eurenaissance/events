<?php

namespace App\Security;

use App\Security\User\UserPasswordInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PasswordEncoder
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function encodePassword(UserPasswordInterface $user, string $plainPassword): void
    {
        $user->changePassword($this->encoder->encodePassword($user, $plainPassword));
    }
}
