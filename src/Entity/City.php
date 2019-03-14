<?php

namespace App\Entity;

use App\Geography\GeographyInterface;
use App\Entity\Util\EntityIdTrait;
use App\Entity\Util\EntityUuidTrait;
use App\Geography\Model\Coordinates;
use CrEOF\Spatial\PHP\Types\Geometry\Point;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Table(name="cities", indexes={
 *     @ORM\Index(name="cities_zip_code_index", columns={"zip_code"}),
 *     @ORM\Index(name="cities_country_index", columns={"country"}),
 * })
 * @ORM\Entity(repositoryClass="App\Repository\CityRepository")
 */
class City implements GeographyInterface
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
     *
     * @Groups("city_autocomplete")
     * @Groups("search")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(length=20)
     */
    private $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(length=20)
     */
    private $canonicalZipCode;

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
        $this->canonicalZipCode = $this->canonicalizeZipCode($zipCode);
        $this->coordinates = new Point($latitude, $longitude);
    }

    public function __toString(): string
    {
        return trim($this->name);
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

    public function getCoordinates(): Coordinates
    {
        return new Coordinates($this->coordinates->getLongitude(), $this->coordinates->getLatitude(), 'low');
    }

    public function getLatitude(): float
    {
        return $this->coordinates->getLatitude();
    }

    public function getLongitude(): float
    {
        return $this->coordinates->getLongitude();
    }

    public static function canonicalizeZipCode(string $zipCode): string
    {
        return mb_strtoupper(preg_replace('/[\s\-]+/', '', $zipCode));
    }
}
