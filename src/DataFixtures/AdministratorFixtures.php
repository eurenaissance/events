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
        $superAdministrator = new Administrator();

        $superAdministrator->setEmailAddress('admin@mobilisation-eu.code');
        $superAdministrator->setPassword($this->encoder->encodePassword($superAdministrator, self::DEFAULT_PASSWORD));
        $superAdministrator->setRoles(['ROLE_SUPER_ADMIN']);
        $superAdministrator->setGoogleAuthenticatorSecret('53YNXH6LFUOBT7LC');

        $manager->persist($superAdministrator);

        $manager->flush();
    }
}
