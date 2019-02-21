<?php

namespace App\Twig;

use League\Glide\Signatures\SignatureFactory;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ImageProviderExtension extends AbstractExtension
{
    private $secret;
    private $urlGenerator;

    public function __construct(string $appSecret, UrlGeneratorInterface $urlGenerator)
    {
        $this->secret = $appSecret;
        $this->urlGenerator = $urlGenerator;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('image_asset', [$this, 'createImageAssetUrl'], ['is_safe' => ['html']]),
        ];
    }

    public function createImageAssetUrl(string $path, array $filters = [], int $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH)
    {
        if (empty($filters['fm'])) {
            $filters['fm'] = 'pjpg';
        }

        $filters['s'] = SignatureFactory::create($this->secret)->generateSignature($path, $filters);
        $filters['path'] = $path;

        return $this->urlGenerator->generate('asset_image', $filters, $referenceType);
    }
}
