<?php

namespace Sherpa\Test\asserts;

use Sherpa\Test\asserts\Assert;

/**
 * Assert class verifying
 * if the provided value is falsy.
 */
class AssertFalsy implements Assert
{
    private mixed $value;

    public function __construct(mixed $value)
    {
        $this->value = $value;
    }

    public function handle(): bool
    {
        return $this->value;
    }
}