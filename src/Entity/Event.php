<?php

namespace App\Entity;

use App\Entity\Util\EntityAddressTrait;
use App\Geocoder\GeocodableInterface;
use App\Entity\Util\EntityIdTrait;
use App\Entity\Util\EntitySlugInterface;
use App\Entity\Util\EntitySlugTrait;
use App\Entity\Util\EntityUuidTrait;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="events")
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 *
 * @UniqueEntity("name", message="event.name.unique")
 * @UniqueEntity("slug", errorPath="name", message="event.slug.unique")
 */
class Event implements EntitySlugInterface, GeocodableInterface
{
    use EntityIdTrait;
    use EntityUuidTrait;
    use EntityAddressTrait;
    use EntitySlugTrait;

    /**
     * @var string|null
     *
     * @ORM\Column(length=50, unique=true)
     *
     * @Assert\NotBlank(message="event.name.not_blank")
     * @Assert\Length(
     *     min=2,
     *     max=50,
     *     minMessage="event.name.min_length",
     *     maxMessage="event.name.max_length"
     * )
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank(message="event.description.not_blank")
     * @Assert\Length(
     *     min=10,
     *     max=300,
     *     minMessage="event.description.min_length",
     *     maxMessage="event.description.max_length"
     * )
     */
    private $description;

    /**
     * @var \DateTimeInterface|null
     *
     * @ORM\Column(type="datetime")
     *
     * @Assert\NotBlank(message="event.begin_at.not_blank")
     * @Assert\Date(message="event.begin_at.date")
     */
    private $beginAt;

    /**
     * @var \DateTimeInterface|null
     *
     * @ORM\Column(type="datetime")
     *
     * @Assert\NotBlank(message="event.finish_at.not_blank")
     * @Assert\Date(message="event.finish_at.date")
     */
    private $finishAt;

    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @var Actor|null
     *
     * @ORM\ManyToOne(targetEntity=Actor::class, inversedBy="events")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $creator;

    /**
     * @var Group|null
     *
     * @ORM\ManyToOne(targetEntity=Group::class, inversedBy="events")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $group;

    public function __construct(UuidInterface $uuid = null)
    {
        $this->uuid = $uuid ?? self::createUuid();
        $this->createdAt = new \DateTimeImmutable();
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
        return sprintf('%s - %s', $this->beginAt->format('Y-m-d'), $this->name);
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

    public function getBeginAt(): ?\DateTimeInterface
    {
        return $this->beginAt;
    }

    public function setBeginAt(\DateTimeInterface $beginAt): void
    {
        $this->beginAt = $beginAt;
    }

    public function getFinishAt(): ?\DateTimeInterface
    {
        return $this->finishAt;
    }

    public function setFinishAt(\DateTimeInterface $finishAt): void
    {
        $this->finishAt = $finishAt;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getCreator(): ?Actor
    {
        return $this->creator;
    }

    public function setCreator(Actor $creator): void
    {
        $this->creator = $creator;
    }

    public function getGroup(): ?Group
    {
        return $this->group;
    }

    public function setGroup(Group $group): void
    {
        $this->group = $group;
    }
}
