<?php

namespace App\Tests\Controller\Event;

use App\Tests\HttpTestCase;

class CalendarControllerTest extends HttpTestCase
{
    public function testIcsIsDownloaded()
    {
        $this->authenticateActor('emmanuel@mobilisation-eu.localhost');

        $this->client->request('GET', '/event/list?token=a14bc7d137fc5d3f21cbe10abe9cb6d3427d704c1');
        $this->assertResponseSuccessFul();

        $events = json_decode($this->client->getResponse()->getContent(), true);
        if (isset($events['hydra:member'][0]['url'])) {
            $ics_link = str_replace('http://localhost', '', $events['hydra:member'][0]['url']).'/ics';
            $this->client->request('GET', $ics_link);
        }

        $this->assertResponseSuccessFul();

        $this->assertResponseContains('BEGIN:VCALENDAR');
    }
}
