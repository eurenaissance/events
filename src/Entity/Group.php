<?php

namespace App\Entity;

use App\Entity\Util\EntityAddressTrait;
use App\Entity\Util\EntityIdTrait;
use App\Entity\Util\EntityReviewTrait;
use App\Entity\Util\EntitySlugInterface;
use App\Entity\Util\EntitySlugTrait;
use App\Entity\Util\EntityUuidTrait;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="groups")
 * @ORM\Entity(repositoryClass="App\Repository\GroupRepository")
 *
 * @UniqueEntity("name", message="group.name.unique")
 */
class Group implements EntitySlugInterface
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
     * @var Actor|null
     *
     * @ORM\ManyToOne(targetEntity=Actor::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $animator;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function __construct(UuidInterface $uuid = null)
    {
        $this->uuid = $uuid ?? self::createUuid();
        $this->createdAt = new \DateTimeImmutable();
    }

    public function __toString(): string
    {
        return trim($this->name);
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAnimator(): ?Actor
    {
        return $this->animator;
    }

    public function setAnimator(Actor $animator): void
    {
        $this->animator = $animator;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function createSlugSource(): string
    {
        return (string) $this->name;
    }
}
