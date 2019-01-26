<?php

namespace App\DataFixtures;

use App\Entity\Administrator;
use App\Security\PasswordEncoder;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AdministratorFixtures extends Fixture
{
    public const DEFAULT_PASSWORD = 'secret!12345';

    private $encoder;

    public function __construct(PasswordEncoder $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $superAdministartor = $this->create('superadmin@mobilisation-eu.code', ['ROLE_SUPER_ADMIN']);
        $administrator = $this->create('admin@mobilisation-eu.code', [], '53YNXH6LFUOBT7LC');

        $manager->persist($superAdministartor);
        $manager->persist($administrator);

        $manager->flush();
    }

    private function create(string $email, array $roles = [], string $googleAuthenticatorSecret = null): Administrator
    {
        $administrator = new Administrator();

        $administrator->setEmailAddress($email);

        foreach ($roles as $role) {
            $administrator->addRole($role);
        }

        if ($googleAuthenticatorSecret) {
            $administrator->setGoogleAuthenticatorSecret($googleAuthenticatorSecret);
        }

        $this->encoder->encodePassword($administrator, self::DEFAULT_PASSWORD);

        return $administrator;
    }
}
