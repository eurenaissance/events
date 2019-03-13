<?php

namespace App\Tests\Controller\Content;

use App\Tests\HttpTestCase;

class ContentControllerTest extends HttpTestCase
{
    public function provideContents(): iterable
    {
        yield [
            1,
            'superadmin@mobilisation-eu.localhost',
            '/page/legalities',
            'Legalities',
        ];

        yield [
            2,
            'superadmin@mobilisation-eu.localhost',
            '/page/terms',
            'Terms of Service',
        ];

        yield [
            3,
            'superadmin@mobilisation-eu.localhost',
            '/page/privacy',
            'Privacy Policy',
        ];
    }

    /**
     * @dataProvider provideContents
     */
    public function testEditSuccess(int $id, string $email, string $url, string $title): void
    {
        $this->authenticateAdmin($email);

        $crawler = $this->client->request('GET', "/admin/app/content/$id/edit");
        $this->assertResponseSuccessFul();

        $form = $crawler->selectButton('Update')->form();
        $uniqId = $this->getAdminFormUniqId($form);
        $this->assertSame($url, $form->get($uniqId.'[url]')->getValue());

        $this->client->submit($form, [$uniqId.'[content]' => 'ceci est un ***test***']);
        $this->assertIsRedirectedTo("/admin/app/content/$id/edit");

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('ceci est un ***test***');
        $this->assertResponseContains('has been successfully updated.');

        // Check if Markdown works correctly
        $this->client->request('GET', $url);
        $this->assertResponseSuccessFul();
        $this->assertResponseContains($title);
        $this->assertResponseContains('<p>ceci est un <strong><em>test</em></strong></p>');
    }

    public function provideContentAdmin(): Iterable
    {
        yield ['/admin/app/content/1/edit'];
        yield ['/admin/app/content/3/edit'];
        yield ['/admin/app/content/3/edit'];
    }

    /**
     * @dataProvider provideContentAdmin
     */
    public function testSimpleAdminCannotSeeContentAdmin(string $uri): void
    {
        $this->authenticateAdmin('admin@mobilisation-eu.localhost');

        $this->client->request('GET', $uri);
        $this->assertAccessDeniedResponse();
    }

    /**
     * @dataProvider provideContentAdmin
     */
    public function testSuperAdminCanSeeContentAdmin(string $uri): void
    {
        $this->authenticateAdmin('superadmin@mobilisation-eu.localhost');

        $this->client->request('GET', $uri);
        $this->assertResponseSuccessFul();
    }

    /**
     * @dataProvider provideContentAdmin
     */
    public function testSimpleUserCannotSeeContentAdmin(string $uri): void
    {
        $this->client->request('GET', $uri);
        $this->assertIsRedirectedTo('/admin/login');
    }
}
