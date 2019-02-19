<?php

namespace App\Validator\IsGeocoded;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * @Target({"CLASS", "ANNOTATION"})
 */
class IsGeocoded extends Constraint
{
    public const NO_SUCH_ADDRESS_ERROR = 'no_such_address_error';

    protected static $errorNames = [
        self::NO_SUCH_ADDRESS_ERROR => 'NO_SUCH_ADDRESS_ERROR',
    ];

    public $message = 'This address was not found.';

    /**
     * {@inheritdoc}
     */
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
