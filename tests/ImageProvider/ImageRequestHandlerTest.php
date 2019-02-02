<?php

namespace App\Tests\ImageProvider;

use App\ImageProvider\ImageRequestHandler;
use App\Tests\UnitTestCase;
use League\Glide\Filesystem\FileNotFoundException;
use League\Glide\Server;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\HttpFoundation\Response;

/**
 * @group unit
 */
class ImageRequestHandlerTest extends UnitTestCase
{
    /** @var Server|MockObject */
    private $glide;

    /** @var ImageRequestHandler */
    private $handler;

    public function setUp()
    {
        $this->glide = $this->createMock(Server::class);
        $this->glide->method('getImageResponse')->willReturn(new Response());

        $this->handler = new ImageRequestHandler('secret', $this->glide);
    }

    public function provideRequests()
    {
        yield 'valid_without_filter' => [
            'image.jpeg',
            ['s' => 'ad72d96cbd50885c7f4c923faf777b86'],
            200,
        ];

        yield 'valid_single_filter' => [
            'image.jpeg',
            ['w' => 100, 's' => '5c533edc874f4000c7cad11148b6fa35'],
            200,
        ];

        yield 'valid_multiple_filters' => [
            'image.jpeg',
            ['w' => 100, 'q' => 90, 's' => 'f90c3932b7941f63f1bd05df756b3c3e'],
            200,
        ];

        yield 'invalid_no_signature' => [
            'image.jpeg',
            ['w' => 100],
            400,
        ];

        yield 'invalid_signature' => [
            'image.jpeg',
            ['w' => 100, 's' => 'invalid'],
            400,
        ];
    }

    /**
     * @dataProvider provideRequests
     */
    public function testHandleRequest($path, $filters, $expectedStatusCode)
    {
        $this->assertSame($expectedStatusCode, $this->handler->handleRequest($path, $filters)->getStatusCode());
    }

    public function testHandleRequestFileNotFound()
    {
        $this->glide->method('getImageResponse')->willThrowException(new FileNotFoundException());

        $this->assertSame(404, $this->handler->handleRequest('image.jpeg', ['s' => 'ad72d96cbd50885c7f4c923faf777b86'])->getStatusCode());
    }
}
