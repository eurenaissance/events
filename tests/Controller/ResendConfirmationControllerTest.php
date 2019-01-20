<?php

namespace Test\App\Controller;

use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class ResendConfirmationControllerTest extends HttpTestCase
{
    public function testRequestSuccess(): void
    {
        $this->assertActorConfirmed('nicolas@mobilisation.eu', false);

        $crawler = $this->client->request('GET', '/register/resend-confirmation');
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Resend confirmation')->form([
            'emailAddress' => 'nicolas@mobilisation.eu',
        ]));
        $this->assertIsRedirectedTo('/register/resend-confirmation/check-email');
        $this->assertMailSent([
            'to' => 'nicolas@mobilisation.eu',
            'subject' => 'mail.actor.registration.subject',
            'body' => "@string@
                        .contains('Welcome Nicolas!')
                        .matchRegex('#href=\"http://localhost/register/confirm/".self::UUID_PATTERN."#\"')",
        ]);

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('A new mail has been sent to confirm your account.');
        $this->assertActorConfirmed('nicolas@mobilisation.eu', false);
    }

    public function testRequestUnknownEmail(): void
    {
        $crawler = $this->client->request('GET', '/register/resend-confirmation');
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Resend confirmation')->form([
            'emailAddress' => 'unknown@mobilisation.eu',
        ]));
        $this->assertIsRedirectedTo('/register/resend-confirmation/check-email');
        $this->assertNoMailSent();

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('A new mail has been sent to confirm your account.');
    }

    public function provideResendConfirmationFailures(): iterable
    {
        yield [
            'email' => 'marine@mobilisation.eu',
            'alreadyConfirmed' => false,
            'redirectedTo' => '/login',
            'errors' => ['A mail has already been sent in the last 2 hours'],
        ];

        yield [
            'email' => 'remi@mobilisation.eu',
            'alreadyConfirmed' => true,
            'redirectedTo' => '/login',
            'errors' => ['Your account is already confirmed.'],
        ];
    }

    /**
     * @dataProvider provideResendConfirmationFailures
     */
    public function testRequestWithPendingToken(
        string $email,
        bool $alreadyConfirmed,
        string $redirectedTo,
        array $errors
    ): void {
        $this->assertActorConfirmed($email, $alreadyConfirmed);

        $crawler = $this->client->request('GET', '/register/resend-confirmation');
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Resend confirmation')->form([
            'emailAddress' => $email,
        ]));
        $this->assertIsRedirectedTo($redirectedTo);
        $this->assertNoMailSent();

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains($errors);
        $this->assertActorConfirmed($email, $alreadyConfirmed);
    }

    private function assertActorConfirmed(string $email, bool $expected): void
    {
        self::assertSame($expected, $this->getActorRepository()->findOneByEmail($email)->isConfirmed());
    }
}
