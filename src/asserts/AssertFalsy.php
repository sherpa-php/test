<?php

namespace Sherpa\Test\asserts;

use Sherpa\Test\asserts\Assert;

/**
 * Assert class verifying
 * if the provided value is truly.
 */
class AssertFalsy implements Assert
{
    public function __construct(mixed $value)
    {
        $this->value = $value;
    }

    public function handle(): bool
    {
        return !$this->value;
    }
}