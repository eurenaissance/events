<?php

namespace Test\App\Controller;

use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class AssetControllerTest extends HttpTestCase
{
    public function testImageValidSignature()
    {
        $this->client->request('GET', '/asset/image/fixtures/home/default.jpg?fm=pjpg&s=e5c5a8f44fce365dd143f309312370f9');
        $this->assertResponseSuccessFul();
    }

    public function testImageInvalidSignature()
    {
        $this->client->request('GET', '/asset/image/fixtures/home/default.jpg?fm=pjpg&s=invalid');
        $this->assertSame(400, $this->client->getResponse()->getStatusCode());
    }
}
