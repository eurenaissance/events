<?php

namespace Test\App\Controller;

use App\Mailer\Mailer;
use App\Tests\HttpTestCase;
use Enqueue\Client\ProducerInterface;
use Enqueue\Client\TraceableProducer;

/**
 * @group functional
 */
class ContactControllerTest extends HttpTestCase
{
    public function testContactAdmin(): void
    {
        $this->client->request('GET', '/contact');
        $this->assertResponseSuccessful();

        $this->client->submitForm('contact.send', [
            'contact_message[sender]' => 'sender@mobilisation-eu.localhost',
            'contact_message[subject]' => 'Subject',
            'contact_message[message]' => "Message\n\nNew line",
        ]);
        $this->assertIsRedirectedTo('/contact');

        /** @var TraceableProducer $producer */
        $producer = self::$container->get(ProducerInterface::class);
        $traces = $producer->getTopicTraces(Mailer::TOPIC);

        $this->assertCount(1, $traces);
        $this->assertEquals('sender@mobilisation-eu.localhost', $traces[0]['body']['from']);
        $this->assertEquals('contact@mobilisation-eu.localhost', $traces[0]['body']['to']);
        $this->assertEquals('Subject', $traces[0]['body']['subject']);
        $this->assertEquals("Message<br />\n<br />\nNew line", $traces[0]['body']['body']);

        $this->client->followRedirect();
        $this->assertResponseSuccessful();
        $this->assertResponseContains('flashes.contact.success');
    }

    public function testContactActor(): void
    {
        $this->client->request('GET', '/contact/actor/472508fa-4e4d-4330-8fda-5fefc92b1a8a');
        $this->assertResponseSuccessful();

        $this->client->submitForm('contact.send', [
            'contact_message[sender]' => 'sender@mobilisation-eu.localhost',
            'contact_message[subject]' => 'Subject',
            'contact_message[message]' => "Message\n\nNew line",
        ]);
        $this->assertIsRedirectedTo('/contact/actor/472508fa-4e4d-4330-8fda-5fefc92b1a8a');

        /** @var TraceableProducer $producer */
        $producer = self::$container->get(ProducerInterface::class);
        $traces = $producer->getTopicTraces(Mailer::TOPIC);

        $this->assertCount(1, $traces);
        $this->assertEquals('sender@mobilisation-eu.localhost', $traces[0]['body']['from']);
        $this->assertEquals('remi@mobilisation-eu.localhost', $traces[0]['body']['to']);
        $this->assertEquals('Subject', $traces[0]['body']['subject']);
        $this->assertEquals("Message<br />\n<br />\nNew line", $traces[0]['body']['body']);

        $this->client->followRedirect();
        $this->assertResponseSuccessful();
        $this->assertResponseContains('flashes.contact.success');
    }
}
