<?php

namespace App\Tests\Controller\Admin;

use App\Tests\HttpTestCase;
use Iterator;
use Symfony\Component\DomCrawler\Field\FileFormField;

class ConfigurationControllerTest extends HttpTestCase
{
    public function testSimpleAdminCanSeeConfigurationAdmin(): void
    {
        $this->authenticateAdmin('admin@mobilisation-eu.localhost');

        $this->client->request('GET', '/admin/app/configuration');
        $this->assertResponseSuccessful();
    }

    public function testSuperAdminCanSeeConfigurationAdmin(): void
    {
        $this->authenticateAdmin('superadmin@mobilisation-eu.localhost');

        $this->client->request('GET', '/admin/app/configuration');
        $this->assertResponseSuccessful();
    }

    public function testNotAuthentificatedCannotSeeConfigurationAdmin(): void
    {
        $this->client->request('GET', '/admin/app/configuration');
        $this->assertIsRedirectedTo('/admin/login');
    }

    public function formCompleteDataProvider(): Iterator
    {
        yield [
            [
                'partyName' => 'Mobilisation EU',
                'partyWebsite' => 'https://mobilisation-eu.localhost',
                'colorPrimary' => '6f80ff',
                'metaDescription' => 'Mobilisation for Europe',
                'metaGoogleAnalyticsId' => 'FOOBAR',
                'homeIntroSubtitle' => "Don't wait for a better Europe.",
                'homeIntroTitle' => 'Change it!',
                'homeIntroButton' => "I'm in!",
                'homeDisplayMap' => '1',
                'emailSender' => 'contact@mobilisation-eu.localhost',
                'emailSenderName' => 'Emmanuel BORGES',
                'emailContact' => 'contact@mobilisation-eu.localhost',
            ],
        ];
    }

    public function formIncompleteDataProvider(): Iterator
    {
        yield [
            [
                'partyName' => '',
                'partyWebsite' => 'https://mobilisation-eu.localhost',
            ],
        ];
    }

    /**
     * @dataProvider formCompleteDataProvider
     */
    public function testEditSuccess(array $formValues): void
    {
        $this->authenticateAdmin('superadmin@mobilisation-eu.localhost');

        $this->client->request('GET', '/admin/app/configuration');
        $this->assertResponseSuccessful();

        $this->client->submitForm('Update configuration', $formValues);

        $this->assertIsRedirectedTo('/admin/app/configuration');
        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessful();

        $form = $crawler->selectButton('Update configuration')->form();

        $this->assertResponseContains('The configuration was successfully updated');
        $this->assertSame($formValues['partyName'], $form->get('partyName')->getValue());
        $this->assertSame($formValues['partyWebsite'], $form->get('partyWebsite')->getValue());
        $this->assertSame($formValues['colorPrimary'], $form->get('colorPrimary')->getValue());
        $this->assertSame($formValues['metaDescription'], $form->get('metaDescription')->getValue());
        $this->assertSame($formValues['metaGoogleAnalyticsId'], $form->get('metaGoogleAnalyticsId')->getValue());
        $this->assertSame($formValues['homeIntroSubtitle'], $form->get('homeIntroSubtitle')->getValue());
        $this->assertSame($formValues['homeIntroTitle'], $form->get('homeIntroTitle')->getValue());
        $this->assertSame($formValues['homeIntroButton'], $form->get('homeIntroButton')->getValue());
        $this->assertSame($formValues['homeIntroSubtitle'], $form->get('homeIntroSubtitle')->getValue());
        $this->assertSame($formValues['homeDisplayMap'], $form->get('homeDisplayMap')->getValue());
        $this->assertSame($formValues['emailSender'], $form->get('emailSender')->getValue());
        $this->assertSame($formValues['emailSenderName'], $form->get('emailSenderName')->getValue());
        $this->assertSame($formValues['emailContact'], $form->get('emailContact')->getValue());
    }

    /**
     * @dataProvider formIncompleteDataProvider
     */
    public function testEditFailed(array $formValues): void
    {
        $this->authenticateAdmin('superadmin@mobilisation-eu.localhost');

        $this->client->request('GET', '/admin/app/configuration');
        $this->assertResponseSuccessful();

        $this->client->submitForm('Update configuration', $formValues);

        $this->assertResponseSuccessful();
        $this->assertResponseContains('This value should not be blank');
    }

    /**
     * @dataProvider formCompleteDataProvider
     */
    public function testEditSuccessWithFiles(array $formValues): void
    {
        $storagePath = __DIR__.'/../../../storage/public/';
        $this->authenticateAdmin('superadmin@mobilisation-eu.localhost');

        $numbersBeforeUpload = count(glob($storagePath.'uploads/configuration/*.jpg'));

        $crawler = $this->client->request('GET', '/admin/app/configuration');
        $this->assertResponseSuccessful();

        $form = $crawler->selectButton('Update configuration')->form();
        $formValues['faviconFile'] = '/storage/public/fixtures/home/default.jpg';
        $form->setValues($formValues);
        /** @var FileFormField $var */
        $var = $form->get('faviconFile');
        $var->upload($storagePath.'fixtures/home/default.jpg');
        $this->client->submit($form);
        $this->assertIsRedirectedTo('/admin/app/configuration');

        $this->client->followRedirect();

        $this->assertResponseContains('The configuration was successfully updated');

        // check if file really uploaded
        $numbersAfterUpload = count(glob($storagePath.'uploads/configuration/*.jpg'));
        $this->assertSame($numbersAfterUpload, ++$numbersBeforeUpload);
    }
}
