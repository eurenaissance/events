<?php

namespace App\Form\DataTransformer;

use App\Entity\City;
use App\Repository\CityRepository;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class CityToUuidTransformer implements DataTransformerInterface
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

        return (string) $city->getUuidAsString();
    }

    /**
     * Transforms a string (number) to an object (issue).
     *
     * @param string $cityUuid
     *
     * @return City|null
     */
    public function reverseTransform($cityUuid)
    {
        if (!Uuid::isValid((string) $cityUuid)) {
            throw new TransformationFailedException('Invalid UUID provided for city.');
        }

        if (!$city = $this->cityRepository->findOneByUuid($cityUuid)) {
            throw new TransformationFailedException("City with uuid \"$cityUuid\" does not exist.");
        }

        return $city;
    }
}
