<?php

namespace App\DataFixtures;

use App\Entity\Administrator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdministratorFixtures extends Fixture
{
    public const DEFAULT_PASSWORD = 'secret!12345';

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $superAdministartor = $this->create([
            'emailAddress' => 'superadmin@mobilisation-eu.code',
            'roles' => ['ROLE_SUPER_ADMIN'],
        ]);

        $administrator = $this->create([
            'emailAddress' => 'admin@mobilisation-eu.code',
            'googleAuthenticatorSecret' => '53YNXH6LFUOBT7LC',
            'roles' => ['ROLE_ADMIN_DASHBOARD'],
        ]);

        $manager->persist($superAdministartor);
        $manager->persist($administrator);

        $manager->flush();
    }

    private function create(array $data): Administrator
    {
        $administrator = new Administrator();

        $administrator->setEmailAddress($data['emailAddress']);
        $administrator->setPassword($this->encoder->encodePassword($administrator, self::DEFAULT_PASSWORD));

        if (isset($data['roles'])) {
            foreach ($data['roles'] as $role) {
                $administrator->addRole($role);
            }
        }

        if (isset($data['googleAuthenticatorSecret'])) {
            $administrator->setGoogleAuthenticatorSecret($data['googleAuthenticatorSecret']);
        }

        return $administrator;
    }
}
