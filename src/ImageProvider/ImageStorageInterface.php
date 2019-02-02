<?php

namespace App\ImageProvider;

use App\ImageProvider\Model\Image;
use Symfony\Component\HttpFoundation\File\File;

interface ImageStorageInterface
{
    /**
     * Store a given image file in the provider filesystem.
     *
     * @param string $name The name to use for the storage.
     * @param File   $file The image content to store.
     *
     * @return Image The stored image.
     */
    public function store(string $name, File $file): Image;

    /**
     * Remove a given image file from the provider filesystem.
     *
     * @param string $name The name to remove from the storage.
     */
    public function remove(string $name);

    /**
     * Clear the cache for the given image name.
     *
     * @param string $name The image filename (including subdirectories).
     */
    public function clearCache(string $name);
}
