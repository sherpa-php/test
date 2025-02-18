<?php

namespace Sherpa\Test\asserts;

/**
 * AssertInterface class verifying
 * if the provided value is true.
 */
class AssertTrue
    extends Assert
    implements AssertInterface
{
    public function __construct(mixed $value)
    {
        $this->value = $value;
    }

    public function handle(): bool
    {
        return $this->value === true;
    }
}