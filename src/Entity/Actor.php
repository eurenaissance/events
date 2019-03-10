<?php

namespace App\Entity;

use App\Entity\Group\AbstractMembership;
use App\Entity\Group\CoAnimatorMembership;
use App\Entity\Group\FollowerMembership;
use App\Entity\Util\EntityAddressTrait;
use App\Entity\Util\EntityIdTrait;
use App\Geography\Geocoder\GeocodableInterface;
use App\Geography\GeographyInterface;
use App\Security\User\ActorInterface;
use App\Entity\Util\EntityUuidTrait;
use App\Validator\IsGeocoded\IsGeocoded;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="actors", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="actors_email_address_unique", columns="email_address"),
 * })
 * @ORM\Entity(repositoryClass="App\Repository\ActorRepository")
 *
 * @UniqueEntity("emailAddress", message="actor.email_address.not_unique", groups={"registration"})
 * @IsGeocoded(groups={"registration", "profile"})
 */
class Actor implements ActorInterface, GeographyInterface, GeocodableInterface
{
    use EntityIdTrait;
    use EntityUuidTrait;
    use EntityAddressTrait;

    public const GENDERS = ['male', 'female', 'other'];

    /**
     * @var string|null
     *
     * @ORM\Column
     *
     * @Assert\Email(message="actor.email_address.invalid", groups={"registration", "profile"})
     * @Assert\NotBlank(message="actor.email_address.not_blank", groups={"registration", "profile"})
     * @Assert\Length(max=255, maxMessage="actor.email_address.max_length", groups={"registration", "profile"})
     */
    private $emailAddress;

    /**
     * @var string|null
     *
     * @ORM\Column(length=50)
     *
     * @Assert\NotBlank(message="actor.first_name.not_blank", groups={"registration", "profile"})
     * @Assert\Length(max=50, maxMessage="actor.first_name.max_length", groups={"registration", "profile"})
     *
     * @Groups("search")
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(length=50)
     *
     * @Assert\NotBlank(message="actor.last_name.not_blank", groups={"registration", "profile"})
     * @Assert\Length(max=50, maxMessage="actor.last_name.max_length", groups={"registration", "profile"})
     *
     * @Groups("search")
     */
    private $lastName;

    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(type="date")
     *
     * @Assert\NotBlank(message="actor.birthday.not_blank", groups={"registration", "profile"})
     * @Assert\Date(message="actor.birthday.invalid", groups={"registration", "profile"})
     */
    private $birthday;

    /**
     * @var string|null
     *
     * @ORM\Column(length=6, nullable=true)
     *
     * @Assert\NotBlank(message="actor.gender.not_blank", groups={"profile"})
     * @Assert\Choice(message="actor.gender.invalid", choices=Actor::GENDERS, groups={"profile"})
     */
    private $gender;

    /**
     * @var string|null
     *
     * @ORM\Column
     */
    private $password;

    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $registeredAt;

    /**
     * @var \DateTimeInterface|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $confirmedAt;

    /**
     * @var Group[]|Collection
     *
     * @ORM\OneToMany(targetEntity=Group::class, mappedBy="animator")
     * @ORM\OrderBy({"createdAt" = "DESC"})
     */
    private $animatedGroups;

    /**
     * @var CoAnimatorMembership[]|Collection
     *
     * @ORM\OneToMany(targetEntity=CoAnimatorMembership::class, mappedBy="actor")
     */
    private $coAnimatorMemberships;

    /**
     * @var FollowerMembership[]|Collection
     *
     * @ORM\OneToMany(targetEntity=FollowerMembership::class, mappedBy="actor")
     */
    private $followerMemberships;

    /**
     * @var Event[]|Collection
     *
     * @ORM\OneToMany(targetEntity=Event::class, mappedBy="creator")
     * @ORM\OrderBy({"createdAt" = "DESC"})
     */
    private $events;

    /**
     * @var string[]
     */
    private $roles = [];

    public function __construct(UuidInterface $uuid = null)
    {
        $this->uuid = $uuid ?? self::createUuid();
        $this->registeredAt = new \DateTimeImmutable();
        $this->animatedGroups = new ArrayCollection();
        $this->coAnimatorMemberships = new ArrayCollection();
        $this->followerMemberships = new ArrayCollection();
        $this->events = new ArrayCollection();
    }

    public function __toString(): string
    {
        return trim($this->getFullName());
    }

    public function isEqualTo(UserInterface $user)
    {
        return $user->getUsername() === $this->getUsername();
    }

    public function getRoles()
    {
        return array_merge($this->roles, ['ROLE_ACTOR']);
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

    public function setEmailAddress(string $emailAddress): void
    {
        $this->emailAddress = mb_strtolower($emailAddress);
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

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTimeInterface $birthday): void
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

    public function getRegisteredAt(): \DateTimeInterface
    {
        return $this->registeredAt;
    }

    public function isConfirmed(): bool
    {
        return null !== $this->confirmedAt;
    }

    public function confirm(): void
    {
        $this->confirmedAt = new \DateTimeImmutable();
    }

    public function getConfirmedAt(): ?\DateTimeInterface
    {
        return $this->confirmedAt;
    }

    /**
     * @return Group[]
     */
    public function getAllGroups(): array
    {
        $groups = [];
        $names = [];

        foreach ($this->animatedGroups as $group) {
            $groups[$group->getUuidAsString()] = $group;
            $names[$group->getUuidAsString()] = strtolower($group->getName());
        }

        /** @var AbstractMembership $membership */
        foreach (array_merge($this->coAnimatorMemberships->toArray(), $this->followerMemberships->toArray()) as $membership) {
            $group = $membership->getGroup();
            if (isset($groups[$group->getUuidAsString()])) {
                continue;
            }

            $groups[$membership->getGroup()->getUuidAsString()] = $group;
            $names[$membership->getGroup()->getUuidAsString()] = strtolower($group->getName());
        }

        $groups = array_values($groups);
        $names = array_values($names);

        array_multisort($names, SORT_ASC, SORT_NATURAL, $groups);

        return $groups;
    }

    public function isAnimator(): bool
    {
        return $this->animatedGroups->isEmpty();
    }

    public function isAnimatorOf(Group $group): bool
    {
        return $this->animatedGroups->contains($group);
    }

    public function hasPendingGroup(): bool
    {
        foreach ($this->animatedGroups as $group) {
            if ($group->isPending()) {
                return true;
            }
        }

        return false;
    }

    public function getAnimatedGroups(): Collection
    {
        return $this->animatedGroups;
    }

    public function isCoAnimator(): bool
    {
        return !$this->coAnimatorMemberships->isEmpty();
    }

    public function isCoAnimatorOf(Group $group): bool
    {
        return $this->getCoAnimatedGroups()->contains($group);
    }

    /**
     * @return Collection|CoAnimatorMembership[]
     */
    public function getCoAnimatorMemberships(): Collection
    {
        return $this->coAnimatorMemberships;
    }

    public function getCoAnimatorMembership(Group $group): CoAnimatorMembership
    {
        foreach ($this->coAnimatorMemberships as $membership) {
            if ($group->equals($membership->getGroup())) {
                return $membership;
            }
        }

        throw new \InvalidArgumentException(sprintf(
            'Actor "%s" is not co-animator group "%s".',
            $this->getUuidAsString(),
            $group->getUuidAsString()
        ));
    }

    public function getCoAnimatedGroups(): ArrayCollection
    {
        return new ArrayCollection(
            array_map(
                function (CoAnimatorMembership $membership) {
                    return $membership->getGroup();
                },
                $this->coAnimatorMemberships->toArray()
            )
        );
    }

    public function isFollower(): bool
    {
        return !$this->followerMemberships->isEmpty();
    }

    public function isFollowerOf(Group $group): bool
    {
        return $this->getFollowedGroups()->contains($group);
    }

    /**
     * @return Collection|FollowerMembership[]
     */
    public function getFollowerMemberships(): Collection
    {
        return $this->followerMemberships;
    }

    public function getFollowerMembership(Group $group): FollowerMembership
    {
        foreach ($this->followerMemberships as $membership) {
            if ($group->equals($membership->getGroup())) {
                return $membership;
            }
        }

        throw new \InvalidArgumentException(sprintf(
            'Actor "%s" is not following group "%s".',
            $this->getUuidAsString(),
            $group->getUuidAsString()
        ));
    }

    public function getFollowedGroups(): ArrayCollection
    {
        return new ArrayCollection(
            array_map(
                function (FollowerMembership $membership) {
                    return $membership->getGroup();
                },
                $this->followerMemberships->toArray()
            )
        );
    }

    public function isMemberOfGroup(Group $group): bool
    {
        return $this->isAnimatorOf($group) || $this->isCoAnimatorOf($group) || $this->isFollowerOf($group);
    }

    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function changePassword(string $encodedPassword): void
    {
        $this->password = $encodedPassword;
    }
}
