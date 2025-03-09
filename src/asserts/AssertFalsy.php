<?php

namespace Sherpa\Test\asserts;

use Sherpa\Test\asserts\AssertInterface;

/**
 * AssertInterface class verifying
 * if the provided value is falsy.
 */
class AssertFalsy
    extends Assert
    implements AssertInterface
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