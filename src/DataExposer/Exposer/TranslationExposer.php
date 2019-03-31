<?php

namespace App\DataExposer\Exposer;

use App\DataExposer\DataExposer;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Contracts\Translation\TranslatorInterface;

class TranslationExposer implements EventSubscriberInterface
{
    private const TO_EXPOSE = [
        'event_search.find',
        'event_search.all_events',
        'event_search.around',
        'event_search.any_city',
        'event_search.no_result.title',
        'event_search.no_result.text',
        'event_search.no_result.button',

        'group_search.find',
        'group_search.all_groups',
        'group_search.around',
        'group_search.any_city',
        'group_search.followers',
        'group_search.no_result.title',
        'group_search.no_result.text',
        'group_search.no_result.button',
        'group_card.learn_more',
    ];

    private $exposer;
    private $translator;

    public function __construct(DataExposer $exposer, TranslatorInterface $translator)
    {
        $this->exposer = $exposer;
        $this->translator = $translator;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => 'expose',
        ];
    }

    public function expose()
    {
        $translations = [];
        foreach (self::TO_EXPOSE as $key) {
            $translations[$key] = $this->translator->trans($key);
        }

        $this->exposer->expose('translations', $translations);
    }
}
