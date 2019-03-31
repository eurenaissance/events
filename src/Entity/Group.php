<?php

namespace App\Entity;

use App\Entity\Group\CoAnimatorMembership;
use App\Entity\Group\FollowerMembership;
use App\Entity\Util\EntityAddressTrait;
use App\Geography\Geocoder\GeocodableInterface;
use App\Geography\GeographyInterface;
use App\Entity\Util\EntityIdTrait;
use App\Entity\Util\EntityReviewInterface;
use App\Entity\Util\EntityReviewTrait;
use App\Entity\Util\EntitySlugInterface;
use App\Entity\Util\EntitySlugTrait;
use App\Entity\Util\EntityUuidTrait;
use App\Validator\IsGeocoded\IsGeocoded;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="groups")
 * @ORM\Entity(repositoryClass="App\Repository\GroupRepository")
 *
 * @UniqueEntity("slug", errorPath="name", message="group.slug.not_unique", repositoryMethod="findWithoutFilters")
 * @IsGeocoded(groups={"registration", "profile"})
 */
class Group implements EntitySlugInterface, GeographyInterface, GeocodableInterface, EntityReviewInterface
{
    use EntityIdTrait;
    use EntityUuidTrait;
    use EntityAddressTrait;
    use EntitySlugTrait;
    use EntityReviewTrait;

    /**
     * @var string|null
     *
     * @ORM\Column(length=50, unique=true)
     *
     * @Assert\NotBlank(message="group.name.not_blank")
     * @Assert\Length(
     *     min=2,
     *     max=50,
     *     minMessage="group.name.min_length",
     *     maxMessage="group.name.max_length"
     * )
     *
     * @Groups("group_autocomplete")
     * @Groups("search")
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank(message="group.description.not_blank")
     * @Assert\Length(
     *     min=10,
     *     max=300,
     *     minMessage="group.description.min_length",
     *     maxMessage="group.description.max_length"
     * )
     */
    private $description;

    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @var Actor|null
     *
     * @ORM\ManyToOne(targetEntity=Actor::class, inversedBy="animatedGroups")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $animator;

    /**
     * @var CoAnimatorMembership[]|Collection
     *
     * @ORM\OneToMany(targetEntity=CoAnimatorMembership::class, mappedBy="group")
     */
    private $coAnimatorMemberships;

    /**
     * @var FollowerMembership[]|Collection
     *
     * @ORM\OneToMany(targetEntity=FollowerMembership::class, mappedBy="group", fetch="EXTRA_LAZY")
     */
    private $followerMemberships;

    /**
     * @var Event[]|Collection
     *
     * @ORM\OneToMany(targetEntity=Event::class, mappedBy="group", fetch="EXTRA_LAZY")
     * @ORM\OrderBy({"beginAt" = "ASC"})
     */
    private $events;

    public function __construct(UuidInterface $uuid = null)
    {
        $this->uuid = $uuid ?? self::createUuid();
        $this->createdAt = new \DateTimeImmutable();
        $this->coAnimatorMemberships = new ArrayCollection();
        $this->followerMemberships = new ArrayCollection();
        $this->events = new ArrayCollection();
    }

    public function __toString(): string
    {
        return trim($this->name);
    }

    public function equals(self $other): bool
    {
        return $this->uuid->equals($other->getUuid());
    }

    public function createSlugSource(): string
    {
        return (string) $this->name;
    }

    public function getMembersCount(): int
    {
        // animator + memberships
        return 1 + $this->coAnimatorMemberships->count() + $this->followerMemberships->count();
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getAnimator(): ?Actor
    {
        return $this->animator;
    }

    public function setAnimator(Actor $animator): void
    {
        $this->animator = $animator;
    }

    public function getFollowerMemberships(): Collection
    {
        return $this->followerMemberships;
    }

    public function getCoAnimatorMemberships(): Collection
    {
        return $this->coAnimatorMemberships;
    }

    public function getCoAnimators(): ArrayCollection
    {
        return new ArrayCollection(
            array_map(
                function (CoAnimatorMembership $membership) {
                    return $membership->getActor();
                },
                $this->coAnimatorMemberships->toArray()
            )
        );
    }

    public function getFollowers(): ArrayCollection
    {
        return new ArrayCollection(
            array_map(
                function (FollowerMembership $membership) {
                    return $membership->getActor();
                },
                $this->followerMemberships->toArray()
            )
        );
    }

    public function getEvents(): Collection
    {
        return $this->events;
    }
}
