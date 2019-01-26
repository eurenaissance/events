<?php

namespace App\Entity;

use App\Entity\Group\CoAnimatorMembership;
use App\Entity\Group\FollowerMembership;
use App\Entity\Util\EntityAddressTrait;
use App\Geocoder\GeocodableInterface;
use App\Entity\Util\EntityIdTrait;
use App\Entity\Util\EntityReviewInterface;
use App\Entity\Util\EntityReviewTrait;
use App\Entity\Util\EntitySlugInterface;
use App\Entity\Util\EntitySlugTrait;
use App\Entity\Util\EntityUuidTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="groups")
 * @ORM\Entity(repositoryClass="App\Repository\GroupRepository")
 *
 * @UniqueEntity("name", message="group.name.unique", repositoryMethod="findWithoutFilters")
 * @UniqueEntity("slug", errorPath="name", message="group.slug.unique", repositoryMethod="findWithoutFilters")
 */
class Group implements EntitySlugInterface, GeocodableInterface, EntityReviewInterface
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
     */
    private $name;

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
     * @ORM\OneToMany(targetEntity=FollowerMembership::class, mappedBy="group")
     */
    private $followerMemberships;

    public function __construct(UuidInterface $uuid = null)
    {
        $this->uuid = $uuid ?? self::createUuid();
        $this->createdAt = new \DateTimeImmutable();
        $this->coAnimatorMemberships = new ArrayCollection();
        $this->followerMemberships = new ArrayCollection();
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
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
}
