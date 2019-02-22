<?php

namespace App\Entity\Util;

use App\Entity\City;
use App\Geography\Model\Coordinates;
use CrEOF\Spatial\PHP\Types\Geometry\Point;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

trait EntityAddressTrait
{
    /**
     * @var string|null
     *
     * @ORM\Column(length=150, nullable=true)
     *
     * @Assert\NotBlank(message="common.address.not_blank", groups={"address"})
     * @Assert\Length(max=150, maxMessage="common.address.max_length", groups={"address"})
     *
     * @Groups("search")
     */
    private $address;

    /**
     * @var City|null
     *
     * @ORM\ManyToOne(targetEntity=City::class, fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     *
     * @Assert\NotBlank(message="common.city.not_blank", groups={"address"})
     *
     * @Groups("search")
     */
    private $city;

    /**
     * @var Point|null
     *
     * @ORM\Column(type="point", nullable=true)
     */
    private $coordinates;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $coordinatesAccuracy;

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

    public function getCoordinates(): ?Coordinates
    {
        if (!$this->coordinates) {
            return null;
        }

        return new Coordinates(
            $this->coordinates->getLongitude(),
            $this->coordinates->getLatitude(),
            $this->coordinatesAccuracy
        );
    }

    public function setCoordinates(?Coordinates $coordinates)
    {
        if (!$coordinates) {
            $this->coordinates = null;
            $this->coordinatesAccuracy = null;

            return;
        }

        $this->coordinates = new Point($coordinates->getLongitude(), $coordinates->getLatitude());
        $this->coordinatesAccuracy = $coordinates->getAccuracy();
    }
}
