<?php

namespace App\Entity;

use App\Entity\Util\EntityIdTrait;
use App\Entity\Util\EntityUuidTrait;
use CrEOF\Spatial\PHP\Types\Geography\Point;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Table(name="cities", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="cities_uuid_unique", columns="uuid")
 * })
 * @ORM\Entity(repositoryClass="App\Repository\CityRepository")
 */
class City
{
    use EntityIdTrait;
    use EntityUuidTrait;

    /**
     * @var string
     *
     * @ORM\Column(length=3)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(length=150)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(length=20)
     */
    private $zipCode;

    /**
     * @var Point
     *
     * @ORM\Column(type="point")
     */
    private $coordinates;

    public function __construct(
        UuidInterface $uuid,
        string $country,
        string $name,
        string $zipCode,
        float $latitude,
        float $longitude
    ) {
        $this->uuid = $uuid;
        $this->country = $country;
        $this->name = $name;
        $this->zipCode = $zipCode;
        $this->coordinates = new Point($longitude, $latitude);
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    public function getCoordinates(): Point
    {
        return $this->coordinates;
    }

    public function getLatitude(): float
    {
        return $this->coordinates->getLatitude();
    }

    public function getLongitude(): float
    {
        return $this->coordinates->getLongitude();
    }
}
