<?php

namespace App\Entity;

use App\Entity\Util\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="configuration")
 * @ORM\Entity(repositoryClass="App\Repository\ConfigurationRepository")
 */
class Configuration
{
    use EntityIdTrait;

    /**
     * @var string|null
     *
     * @ORM\Column(length=50)
     *
     * @Assert\NotBlank
     * @Assert\Length(max=50)
     */
    private $partyName;

    /**
     * @var string|null
     *
     * @ORM\Column(length=100)
     *
     * @Assert\NotBlank
     * @Assert\Length(max=100)
     */
    private $partyLogo;

    /**
     * @var string|null
     *
     * @ORM\Column(length=100)
     *
     * @Assert\NotBlank
     * @Assert\Length(max=100)
     */
    private $partyWebsite;

    /**
     * @var string|null
     *
     * @ORM\Column(length=8)
     *
     * @Assert\NotBlank
     * @Assert\Length(max=8)
     */
    private $colorPrimary;

    /**
     * @var string|null
     *
     * @ORM\Column(length=50)
     *
     * @Assert\NotBlank
     * @Assert\Length(max=50)
     */
    private $fontPrimary;

    /**
     * @var string|null
     *
     * @ORM\Column(length=50)
     *
     * @Assert\NotBlank
     * @Assert\Length(max=50)
     */
    private $fontMono;

    /**
     * @var string|null
     *
     * @ORM\Column(length=200)
     *
     * @Assert\NotBlank
     * @Assert\Length(max=200)
     */
    private $metaDescription;

    /**
     * @var string|null
     *
     * @ORM\Column(length=100)
     *
     * @Assert\NotBlank
     * @Assert\Length(max=100)
     */
    private $metaImage;

    /**
     * @var string|null
     *
     * @ORM\Column(length=30, nullable=true)
     *
     * @Assert\Length(max=30)
     */
    private $metaGoogleAnalyticsId;

    /**
     * @var string|null
     *
     * @ORM\Column(length=100)
     *
     * @Assert\NotBlank
     * @Assert\Length(max=100)
     */
    private $homePicture;

    public function getPartyName(): ?string
    {
        return $this->partyName;
    }

    public function setPartyName(?string $partyName)
    {
        $this->partyName = $partyName;
    }

    public function getPartyLogo(): ?string
    {
        return $this->partyLogo;
    }

    public function setPartyLogo(?string $partyLogo)
    {
        $this->partyLogo = $partyLogo;
    }

    public function getPartyWebsite(): ?string
    {
        return $this->partyWebsite;
    }

    public function setPartyWebsite(?string $partyWebsite)
    {
        $this->partyWebsite = $partyWebsite;
    }

    public function getColorPrimary(): ?string
    {
        return $this->colorPrimary;
    }

    public function setColorPrimary(?string $colorPrimary)
    {
        $this->colorPrimary = $colorPrimary;
    }

    public function getFontPrimary(): ?string
    {
        return $this->fontPrimary;
    }

    public function setFontPrimary(?string $fontPrimary)
    {
        $this->fontPrimary = $fontPrimary;
    }

    public function getFontMono(): ?string
    {
        return $this->fontMono;
    }

    public function setFontMono(?string $fontMono)
    {
        $this->fontMono = $fontMono;
    }

    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    public function setMetaDescription(?string $metaDescription)
    {
        $this->metaDescription = $metaDescription;
    }

    public function getMetaImage(): ?string
    {
        return $this->metaImage;
    }

    public function setMetaImage(?string $metaImage)
    {
        $this->metaImage = $metaImage;
    }

    public function getMetaGoogleAnalyticsId(): ?string
    {
        return $this->metaGoogleAnalyticsId;
    }

    public function setMetaGoogleAnalyticsId(?string $metaGoogleAnalyticsId)
    {
        $this->metaGoogleAnalyticsId = $metaGoogleAnalyticsId;
    }

    public function getHomePicture(): ?string
    {
        return $this->homePicture;
    }

    public function setHomePicture(?string $homePicture)
    {
        $this->homePicture = $homePicture;
    }
}
