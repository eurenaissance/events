<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="actors", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="acors_email_address_unique", columns="email_address")
 * })
 * @ORM\Entity(repositoryClass="App\Repository\ActorRepository")
 *
 * @UniqueEntity(fields={"emailAddress"})
 */
class Actor implements UserInterface
{
    use EntityIdTrait;
    use EntityUuidTrait;

    /**
     * @var string|null
     *
     * @ORM\Column
     *
     * @Assert\Email(message="common.email.email", groups={"registration", "profile"})
     * @Assert\NotBlank(message="common.email.not_blank", groups={"registration", "profile"})
     * @Assert\Length(max=255, maxMessage="common.email.max_length", groups={"registration", "profile"})
     */
    private $emailAddress;

    /**
     * @var string|null
     *
     * @ORM\Column(length=50)
     *
     * @Assert\NotBlank(message="common.first_name.not_blank", groups={"registration", "profile"})
     * @Assert\Length(max=50, maxMessage="common.firstName.max_length", groups={"registration", "profile"})
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(length=50)
     *
     * @Assert\NotBlank(message="common.last_name.not_blank", groups={"registration", "profile"})
     * @Assert\Length(max=50, maxMessage="common.lastName.max_length", groups={"registration", "profile"})
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(type="date")
     *
     * @Assert\NotBlank(message="common.birthday.not_blank")
     * @Assert\Date(message="common.birthday.date", groups={"registration", "profile"})
     */
    private $birthday;

    /**
     * @var string|null
     *
     * @ORM\Column(length=6, nullable=true)
     *
     * @Assert\NotBlank(message="common.gender.not_blank", groups={"profile"})
     * @Assert\Choice(message="common.gender.choice", choices={"female", "male", "other"}, groups={"profile"})
     */
    private $gender;

    /**
     * @var string|null
     *
     * @ORM\Column
     */
    private $password;

    /**
     * @var string[]
     */
    private $roles = [];

    public function __construct(UuidInterface $uuid = null)
    {
        $this->uuid = $uuid ?? self::createUuid();
    }

    public function __toString(): string
    {
        return trim($this->getFullName());
    }

    public function getRoles()
    {
        return array_merge($this->roles, ['ROLE_USER']);
    }

    /**
     * @param string[] $roles
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
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

    public function getFullName(): string
    {
        return $this->firstName.' '.$this->lastName;
    }

    public function getPartialName(): string
    {
        return $this->firstName.' '.$this->getLastNameInitial();
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getLastNameInitial(): string
    {
        $normalized = preg_replace('/[^a-z]+/', '', strtolower($this->lastName));

        return strtoupper($normalized[0]).'.';
    }

    public function getBirthday(): ?\DateTime
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTime $birthday): void
    {
        $this->birthday = $birthday;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @param string|null $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}
