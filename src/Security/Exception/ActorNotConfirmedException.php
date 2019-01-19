<?php

namespace App\Security\Exception;

use Symfony\Component\Security\Core\Exception\AccountStatusException;

class ActorNotConfirmedException extends AccountStatusException
{
    private const MESSAGE_KEY = 'security.actor.not_confirmed';
    private const URL_KEY = '%resend_confirmation_url%';

    private $resendConfirmationUrl;

    public function __construct(string $resendConfirmationUrl, int $code = 0, \Throwable $previous = null)
    {
        parent::__construct('Actor is not confirmed.', $code, $previous);

        $this->resendConfirmationUrl = $resendConfirmationUrl;
    }

    public function getMessageKey()
    {
        return self::MESSAGE_KEY;
    }

    public function getMessageData()
    {
        return [self::URL_KEY => $this->resendConfirmationUrl];
    }

    public function serialize()
    {
        return serialize([
            $this->resendConfirmationUrl,
            parent::serialize(),
        ]);
    }

    public function unserialize($str)
    {
        [$this->resendConfirmationUrl, $parentData] = unserialize($str);

        parent::unserialize($parentData);
    }
}
