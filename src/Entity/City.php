<?php

namespace App\Entity;

use App\Entity\Util\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="cities")
 * @ORM\Entity(repositoryClass="App\Repository\CityRepository")
 */
class City
{
    use EntityIdTrait;

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
     * @var float
     *
     * @ORM\Column(type="decimal", precision=9, scale=6)
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(type="decimal", precision=9, scale=6)
     */
    private $longitude;

    public function __construct(string $country, string $name, string $zipCode, float $latitude, float $longitude)
    {
        $this->country = $country;
        $this->name = $name;
        $this->zipCode = $zipCode;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
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

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }
}
