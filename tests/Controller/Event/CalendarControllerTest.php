<?php

namespace App\Tests\Controller\Event;

use App\Entity\Event;
use App\Repository\EventRepository;
use App\Tests\HttpTestCase;

class CalendarControllerTest extends HttpTestCase
{
    public function testIcs()
    {
        $this->authenticateActor('emmanuel@mobilisation-eu.localhost');

        /** @var Event $event */
        $event = $this->get(EventRepository::class)->findOneBy(['uuid' => '690597d3-2697-4b57-b0a2-d2a384d2c532']);

        $this->client->request('GET', '/event/'.$event->getSlug().'/ics');
        $this->assertResponseSuccessful();
        $this->assertResponseContains('BEGIN:VCALENDAR');
    }

    public function testGoogle()
    {
        $this->authenticateActor('emmanuel@mobilisation-eu.localhost');

        /** @var Event $event */
        $event = $this->get(EventRepository::class)->findOneBy(['uuid' => '690597d3-2697-4b57-b0a2-d2a384d2c532']);

        $this->client->request('GET', '/event/'.$event->getSlug().'/google');
        $this->assertIsRedirectedTo('@string@.startsWith(\'https://calendar.google.com\')');
    }
}
