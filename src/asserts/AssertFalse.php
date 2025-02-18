<?php

namespace Sherpa\Test\asserts;

/**
 * AssertInterface class verifying
 * if the provided value is false.
 */
class AssertFalse
    extends Assert
    implements AssertInterface
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