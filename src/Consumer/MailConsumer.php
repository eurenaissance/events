<?php

namespace App\Consumer;

use Enqueue\Client\TopicSubscriberInterface;
use Enqueue\Consumption\Result;
use Interop\Queue\Context;
use Interop\Queue\Message;
use Interop\Queue\Processor;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class MailConsumer implements Processor, TopicSubscriberInterface
{
    public const TOPIC = 'mail';

    private $mailer;
    private $defaultSender;
    private $logger;

    public function __construct(\Swift_Mailer $mailer, array $defaultSender, LoggerInterface $logger = null)
    {
        $this->mailer = $mailer;
        $this->defaultSender = $defaultSender;
        $this->logger = $logger ?: new NullLogger();
    }

    public static function getSubscribedTopics()
    {
        return static::TOPIC;
    }

    public function process(Message $message, Context $context)
    {
        try {
            $data = \GuzzleHttp\json_decode($message->getBody(), true);
        } catch (\Throwable $t) {
            $this->logger->error('Couldn\'t decode message:', [$message->getBody()]);

            return Result::reject('Invalid message: '.$t->getMessage());
        }

        if (!isset($data['to'], $data['subject'], $data['body'])) {
            $this->logger->error('Missing key (to|subject|body):', [$data]);

            return Result::reject('Invalid message: missing key (required: to, subject, body) in '.$message->getBody());
        }

        $mail = new \Swift_Message();
        $mail->setFrom($data['from'] ?? $this->defaultSender);
        $mail->setTo($data['to']);
        $mail->setSubject((string) $data['subject']);
        $mail->addPart((string) $data['body'], 'text/html');

        if (isset($data['cc'])) {
            $mail->setCc($data['cc']);
        }

        if (isset($data['bcc'])) {
            $mail->setBcc($data['bcc']);
        }

        $logTo = explode('@', $data['to']);
        $logTo = implode('@', [substr($logTo[0], 0, 2).'...', $logTo[1]]);

        $this->logger->info('Sending mail "'.$data['subject'].'"', ['to' => $logTo]);
        $this->mailer->send($mail);

        return Result::ack();
    }
}
