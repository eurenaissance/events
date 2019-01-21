<?php

namespace App\Form\DataTransformer;

use App\Entity\City;
use App\Repository\CityRepository;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class CityToIdTransformer implements DataTransformerInterface
{
    private $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * @param City|null $city
     *
     * @return string
     */
    public function transform($city)
    {
        if (!$city) {
            return '';
        }

        return (string) $city->getId();
    }

    /**
     * Transforms a string (number) to an object (issue).
     *
     * @param string $cityId
     *
     * @return City|null
     */
    public function reverseTransform($cityId)
    {
        if (!$cityId) {
            throw new TransformationFailedException('City is required');
        }

        if (!$city = $this->cityRepository->find((int) $cityId)) {
            throw new TransformationFailedException("City with id $cityId does not exist.");
        }

        return $city;
    }
}
