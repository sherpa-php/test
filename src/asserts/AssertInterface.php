<?php

namespace Sherpa\Test\asserts;

/**
 * Assert interface.
 * <p>
 *     Used for asserting an expected behavior
 *     during test.
 * </p>
 */
interface AssertInterface
{
    public function handle(): bool;
}