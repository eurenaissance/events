<?php

namespace App\Entity\Util;

use App\Entity\City;
use CrEOF\Spatial\PHP\Types\Geography\Point;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait EntityAddressTrait
{
    /**
     * @var string|null
     *
     * @ORM\Column(length=150, nullable=true)
     *
     * @Assert\Length(max=150, maxMessage="common.address.max_length", groups={"registration", "profile"})
     */
    private $address;

    /**
     * @var City|null
     *
     * @ORM\ManyToOne(targetEntity=City::class)
     * @ORM\JoinColumn(nullable=false)
     *
     * @Assert\NotBlank(message="common.city.not_blank", groups={"registration", "profile"})
     */
    private $city;

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(City $city): void
    {
        $this->city = $city;
    }

    public function getZipCode(): ?string
    {
        return $this->city ? $this->city->getZipCode() : null;
    }

    public function getCountry(): ?string
    {
        return $this->city ? $this->city->getCountry() : null;
    }

    public function getCoordinates(): ?Point
    {
        return $this->city ? $this->city->getCoordinates() : null;
    }
}
