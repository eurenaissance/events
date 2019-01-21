<?php

namespace App\Entity\Util;

interface EntitySlugInterface
{
    /**
     * Returns the value to encode as a slug.
     *
     * @return string
     */
    public function slug(): string;

    /**
     * Sets the encoded slug.
     *
     * @param string $slug
     */
    public function setSlug(string $slug): void;
}
