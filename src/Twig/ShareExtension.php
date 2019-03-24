<?php

namespace App\Twig;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ShareExtension extends AbstractExtension
{
    private $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('facebook_share_url', [$this, 'createFacebookUrl']),
            new TwigFunction('twitter_share_url', [$this, 'createTwitterUrl']),
            new TwigFunction('telegram_share_url', [$this, 'createTelegramUrl']),
            new TwigFunction('whatsapp_share_url', [$this, 'createWhatsappUrl']),
            new TwigFunction('mailto_share_url', [$this, 'createMailtoUrl']),
        ];
    }

    public function createFacebookUrl($route, array $params = [], string $message = ''): string
    {
        $query = ['u' => $this->urlGenerator->generate($route, $params, UrlGeneratorInterface::ABSOLUTE_URL)];
        if ($message) {
            $query['quote'] = $message;
        }

        return $this->createUrl('https://www.facebook.com/sharer/sharer.php', $query);
    }

    public function createTwitterUrl($route, array $params = [], string $message = ''): string
    {
        $message = $message ? $message.' ' : '';

        return $this->createUrl('https://twitter.com/intent/tweet', [
            'text' => $message.$this->urlGenerator->generate($route, $params, UrlGeneratorInterface::ABSOLUTE_URL),
        ]);
    }

    public function createTelegramUrl($route, array $params = [], string $message = ''): string
    {
        $query = ['url' => $this->urlGenerator->generate($route, $params, UrlGeneratorInterface::ABSOLUTE_URL)];
        if ($message) {
            $query['text'] = $message;
        }

        return $this->createUrl('https://telegram.me/share/url', $query);
    }

    public function createWhatsappUrl($route, array $params = [], string $message = ''): string
    {
        $message = $message ? $message.' ' : '';

        return $this->createUrl('https://wa.me/', [
            'text' => $message.$this->urlGenerator->generate($route, $params, UrlGeneratorInterface::ABSOLUTE_URL),
        ]);
    }

    public function createMailtoUrl($route, array $params = [], string $subject = '', string $body = ''): string
    {
        $body = $body ? $body.' ' : '';
        $query = urldecode(http_build_query([
            'subject' => rawurlencode($subject),
            'body' => rawurlencode($body.$this->urlGenerator->generate($route, $params, UrlGeneratorInterface::ABSOLUTE_URL)),
        ]));

        return 'mailto:?'.$query;
    }

    private function createUrl(string $root, array $query): string
    {
        return $root.'?'.http_build_query($query);
    }
}
