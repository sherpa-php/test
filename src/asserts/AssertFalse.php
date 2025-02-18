<?php

namespace Sherpa\Test\asserts;

/**
 * Assert class verifying
 * if the provided value is false.
 */
class AssertFalse implements Assert
{
    public function __construct(mixed $value)
    {
        $this->value = $value;
    }

    public function handle(): bool
    {
        return $this->value === false;
    }
}