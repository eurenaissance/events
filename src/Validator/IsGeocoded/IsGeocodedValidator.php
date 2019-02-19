<?php

namespace App\Validator\IsGeocoded;

use App\Geography\Geocoder\GeocodableInterface;
use App\Geography\Geocoder\GeocoderInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class IsGeocodedValidator extends ConstraintValidator
{
    private $geocoder;

    public function __construct(GeocoderInterface $geocoder)
    {
        $this->geocoder = $geocoder;
    }

    /**
     * @param GeocodableInterface $geocodable
     * @param IsGeocoded          $constraint
     */
    public function validate($geocodable, Constraint $constraint)
    {
        if (!$geocodable instanceof GeocodableInterface) {
            throw new UnexpectedTypeException($geocodable, GeocodableInterface::class);
        }

        if (!$geocodable->getAddress() || !$geocodable->getCity()) {
            return;
        }

        $geocoded = $this->geocoder->geocode($geocodable->getAddress(), $geocodable->getCity());
        $geocodable->setCoordinates($geocoded);

        if (!$geocoded) {
            $this->context->addViolation($constraint->message);
        }
    }
}
