<?php

namespace Sherpa\Sherpa\test\exceptions;

use Sherpa\Exceptions\exceptions\SherpaException;
use Throwable;

class InvalidTestClassException extends SherpaException
{
    public function __construct(string $class,
                                ?Throwable $previous = null)
    {
        $message = "$class is not a Sherpa Test class.";

        parent::__construct($message, 1601, $previous);
    }
}