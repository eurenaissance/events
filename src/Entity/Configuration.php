<?php

namespace App\Entity;

use App\Entity\Util\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
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
     * @ORM\Column(length=50)
     */
    private $partyLogo;

    /**
     * @var string|null
     *
     * @ORM\Column(length=200)
     *
     * @Assert\NotBlank
     * @Assert\Length(max=200)
     * @Assert\Url
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
     * @ORM\Column(length=50)
     *
     * @Assert\NotBlank
     * @Assert\Length(max=50)
     */
    private $favicon;

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
     * @ORM\Column(length=50)
     *
     * @Assert\NotBlank
     * @Assert\Length(max=50)
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
    private $homeImage;

    /**
     * @var string|null
     *
     * @ORM\Column(length=50)
     *
     * @Assert\NotBlank
     * @Assert\Length(max=50)
     */
    private $homeIntroSubtitle;

    /**
     * @var string|null
     *
     * @ORM\Column(length=30)
     *
     * @Assert\NotBlank
     * @Assert\Length(max=30)
     */
    private $homeIntroTitle;

    /**
     * @var string|null
     *
     * @ORM\Column(length=50)
     *
     * @Assert\NotBlank
     * @Assert\Length(max=50)
     */
    private $homeIntroButton;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    private $homeDisplayMap;

    /**
     * @var string|null
     *
     * @ORM\Column(length=200)
     *
     * @Assert\NotBlank
     * @Assert\Length(max=200)
     * @Assert\Email
     */
    private $emailSender;

    /**
     * @var string|null
     *
     * @ORM\Column(length=50, nullable=true)
     *
     * @Assert\NotBlank
     * @Assert\Length(max=50)
     */
    private $emailSenderName;

    /**
     * @var string|null
     *
     * @ORM\Column(length=200, nullable=true)
     *
     * @Assert\NotBlank
     * @Assert\Length(max=200)
     * @Assert\Email
     */
    private $emailContact;

    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(type="datetime")
     *
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

    public function __construct()
    {
        $this->updatedAt = new \DateTime();
    }

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

    public function getFavicon(): ?string
    {
        return $this->favicon;
    }

    public function setFavicon(?string $favicon)
    {
        $this->favicon = $favicon;
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

    public function getHomeImage(): ?string
    {
        return $this->homeImage;
    }

    public function setHomeImage(?string $homeImage)
    {
        $this->homeImage = $homeImage;
    }

    public function getHomeIntroSubtitle(): ?string
    {
        return $this->homeIntroSubtitle;
    }

    public function setHomeIntroSubtitle(?string $homeIntroSubtitle)
    {
        $this->homeIntroSubtitle = $homeIntroSubtitle;
    }

    public function getHomeIntroTitle(): ?string
    {
        return $this->homeIntroTitle;
    }

    public function setHomeIntroTitle(?string $homeIntroTitle)
    {
        $this->homeIntroTitle = $homeIntroTitle;
    }

    public function getHomeIntroButton(): ?string
    {
        return $this->homeIntroButton;
    }

    public function setHomeIntroButton(?string $homeIntroButton)
    {
        $this->homeIntroButton = $homeIntroButton;
    }

    public function getHomeDisplayMap(): bool
    {
        return $this->homeDisplayMap;
    }

    public function setHomeDisplayMap(bool $homeDisplayMap)
    {
        $this->homeDisplayMap = $homeDisplayMap;
    }

    public function getEmailSender(): ?string
    {
        return $this->emailSender;
    }

    public function setEmailSender(?string $emailSender)
    {
        $this->emailSender = $emailSender;
    }

    public function getEmailSenderName(): ?string
    {
        return $this->emailSenderName;
    }

    public function setEmailSenderName(?string $emailSenderName)
    {
        $this->emailSenderName = $emailSenderName;
    }

    public function getEmailContact(): ?string
    {
        return $this->emailContact;
    }

    public function setEmailContact(?string $emailContact)
    {
        $this->emailContact = $emailContact;
    }

    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }
}
