<?php

namespace Sherpa\Test\asserts;

/**
 * Assert interface.
 * <p>
 *     Used for asserting an expected behavior
 *     during test.
 * </p>
 */
interface Assert
{
    public mixed $value {get; set;}

    public function handle(): bool;
}