<?php

namespace App\ImageProvider;

use App\ImageProvider\Model\Image;
use Intervention\Image\Constraint;
use Intervention\Image\Image as ImageData;
use Intervention\Image\ImageManager;
use League\Flysystem\FilesystemInterface;
use League\Glide\Server;
use Symfony\Component\HttpFoundation\File\File;

/**
 * The image provider is the entrypoint of image management of the application.
 *
 * It leverages Glide (http://glide.thephpleague.com) and Flysystem (http://flysystem.thephpleague.com/docs/)
 * to create an easy to use and flexible image manipulation service directly inside the application.
 */
class ImageStorage implements ImageStorageInterface
{
    private const MAX_STORED_WIDTH = 3000;
    private const MAX_STORED_HEIGHT = 2500;

    private $imageManager;
    private $storage;
    private $glide;

    public function __construct(ImageManager $im, FilesystemInterface $publicImages, Server $glide)
    {
        $this->imageManager = $im;
        $this->storage = $publicImages;
        $this->glide = $glide;
    }

    public function clearCache(string $name)
    {
        $this->glide->deleteCache($name);
    }

    public function remove(string $name)
    {
        try {
            $this->storage->delete($name);
        } catch (\Exception $e) {
        }
    }

    public function store(string $name, File $file): Image
    {
        if (0 !== strpos($file->getMimeType(), 'image/')) {
            throw new \InvalidArgumentException('This file is not a valid image file.');
        }

        $image = $this->storeOptimizedImage($name, $file);

        // Clear possibly existing cache
        $this->glide->deleteCache($image->getFilename());

        return $image;
    }

    private function storeOptimizedImage(string $name, File $file): Image
    {
        $imageRawData = file_get_contents($file->getPathname());
        $image = $this->imageManager->make($imageRawData);

        // GIF => stored as-is
        if ('image/gif' === $file->getMimeType()) {
            $name .= '.gif';
            $this->storage->put($name, $imageRawData);

            return new Image($name, 'image/gif', $image->getWidth(), $image->getHeight(), $this->storage->getSize($name));
        }

        // SVG => stored as-is
        if ('image/svg+xml' === $file->getMimeType()) {
            $name .= '.svg';
            $this->storage->put($name, $imageRawData);

            return new Image($name, 'image/svg+xml', 0, 0, $this->storage->getSize($name));
        }

        // Everything else => resize, add white background and encode in JPEG 80%
        $name .= '.jpg';
        $image = $this->resizeForStorage($image);

        $this->storage->put($name, $image->encode('jpg', 87));

        return new Image($name, 'image/jpeg', $image->getWidth(), $image->getHeight(), $this->storage->getSize($name));
    }

    private function resizeForStorage(ImageData $image): ImageData
    {
        $width = null;
        $height = null;

        if ($image->getWidth() >= $image->getHeight()) {
            $width = min($image->getWidth(), self::MAX_STORED_WIDTH);
        } else {
            $height = min($image->getHeight(), self::MAX_STORED_HEIGHT);
        }

        $image = $image->resize($width, $height, function (Constraint $constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $image = $image->resize($width, $height);

        $jpeg = $this->imageManager->canvas($image->getWidth(), $image->getHeight(), '#fff');
        $jpeg->insert($image, 'center');

        return $jpeg;
    }
}
