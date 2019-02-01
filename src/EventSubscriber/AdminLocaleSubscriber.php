<?php

namespace App\EventSubscriber;

use App\Entity\Administrator;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Security;
use Symfony\Contracts\Translation\LocaleAwareInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class AdminLocaleSubscriber implements EventSubscriberInterface
{
    private const ADMIN_LOCALE = 'en';

    private $security;
    private $translator;

    public function __construct(Security $security, TranslatorInterface $translator)
    {
        $this->security = $security;
        $this->translator = $translator;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => [['onKernelRequest', 5]],
        ];
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if (!$user = $this->security->getUser()) {
            return;
        }

        if (!$user instanceof Administrator) {
            return;
        }

        $request = $event->getRequest();
        $request->setLocale(self::ADMIN_LOCALE);

        if ($this->translator instanceof LocaleAwareInterface) {
            $this->translator->setLocale(self::ADMIN_LOCALE);
        }
    }
}
