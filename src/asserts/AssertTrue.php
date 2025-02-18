<?php

namespace Sherpa\Test\asserts;

/**
 * Assert class verifying
 * if the provided value is true.
 */
class AssertTrue implements Assert
{
    private mixed $value;

    public function __construct(mixed $value)
    {
        $this->value = $value;
    }

    public function handle(): bool
    {
        return $this->value === true;
    }
}