<?php

namespace App\Tests\ImageProvider;

use App\ImageProvider\ImageStorage;
use App\Tests\UnitTestCase;
use Intervention\Image\ImageManager;
use League\Flysystem\Filesystem;
use League\Flysystem\Memory\MemoryAdapter;
use League\Glide\Server;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @group unit
 */
class ImageStorageTest extends UnitTestCase
{
    /** @var Server|MockObject */
    private $glide;

    /** @var Filesystem */
    private $filesystem;

    /** @var ImageStorage */
    private $storage;

    public function setUp()
    {
        $this->glide = $this->createMock(Server::class);
        $this->filesystem = new Filesystem(new MemoryAdapter());
        $this->storage = new ImageStorage(new ImageManager(), $this->filesystem, $this->glide);
    }

    public function testClearCache()
    {
        $this->glide->expects($this->once())->method('deleteCache')->with('image.jpeg');
        $this->storage->clearCache('image.jpeg');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testStoreInvalidFile()
    {
        $this->storage->store('image.jpeg', new File(__DIR__.'/../Fixtures/ImageProvider/invalid.txt'));
    }

    public function testStoreValidJpgFileToResize()
    {
        $this->glide->expects($this->once())->method('deleteCache')->with('sub/image.jpg');

        $image = $this->storage->store('sub/image', new File(__DIR__.'/../Fixtures/ImageProvider/to-resize.jpg'));

        $this->assertTrue($this->filesystem->has('sub/image.jpg'));
        $this->assertSame(3000, $image->getWidth());
        $this->assertSame(2000, $image->getHeight());
    }

    public function testStoreValidJpgFileToKeepAsIs()
    {
        $this->glide->expects($this->once())->method('deleteCache')->with('sub/image.jpg');

        $image = $this->storage->store('sub/image', new File(__DIR__.'/../Fixtures/ImageProvider/to-keep.jpg'));

        $this->assertTrue($this->filesystem->has('sub/image.jpg'));
        $this->assertSame(1000, $image->getWidth());
        $this->assertSame(667, $image->getHeight());
    }
}
