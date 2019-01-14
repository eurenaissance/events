<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Scheb\TwoFactorBundle\Model\Google\TwoFactorInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="administrators", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="administrators_email_address_unique", columns="email_address")
 * })
 * @ORM\Entity(repositoryClass="App\Repository\AdministratorRepository")
 *
 * @UniqueEntity(fields={"emailAddress"})
 */
class Administrator implements UserInterface, TwoFactorInterface
{
    use EntityIdTrait;

    /**
     * @var string|null
     *
     * @ORM\Column
     *
     * @Assert\Email
     * @Assert\NotBlank
     * @Assert\Length(max=255, maxMessage="common.email.max_length")
     */
    private $emailAddress;

    /**
     * @var string|null
     *
     * @ORM\Column
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true)
     */
    private $googleAuthenticatorSecret;

    /**
     * @var array
     *
     * @ORM\Column(type="simple_array")
     */
    private $roles;

    public function __construct()
    {
        $this->roles = ['ROLE_ADMIN_DASHBOARD'];
    }

    public function __toString(): string
    {
        return $this->emailAddress ?: '';
    }

    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param string[] $roles
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    public function addRole(string $role): void
    {
        if (!\in_array($role, $this->roles, true)) {
            $this->roles[] = $role;
        }
    }

    public function getSalt()
    {
        return;
    }

    public function getUsername()
    {
        return $this->emailAddress;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function eraseCredentials()
    {
        $this->password = null;
    }

    /**
     * @return string|null
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param string|null $emailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * @param string|null $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function isGoogleAuthenticatorEnabled(): bool
    {
        return null !== $this->googleAuthenticatorSecret;
    }

    public function getGoogleAuthenticatorSecret(): string
    {
        return $this->googleAuthenticatorSecret ?? '';
    }

    public function getGoogleAuthenticatorUsername(): string
    {
        return $this->emailAddress;
    }

    public function setGoogleAuthenticatorSecret($googleAuthenticatorSecret): void
    {
        $this->googleAuthenticatorSecret = $googleAuthenticatorSecret;
    }
}
