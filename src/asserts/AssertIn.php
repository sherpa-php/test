<?php

namespace Sherpa\Test\asserts;

use Sherpa\Test\asserts\Assert;
use Sherpa\Test\asserts\AssertInterface;

/**
 * Assert In
 * <p>
 *     Verify if the provided value is in
 *     the provided array.
 * </p>
 */
class AssertIn
    extends Assert
    implements AssertInterface
{
    public private(set) array $haystack;

    public function __construct(
        mixed $needle,
        array $haystack)
    {
        $this->value = $needle;
        $this->haystack = $haystack;
    }

    public function handle(): bool
    {
        return in_array($this->value, $this->haystack);
    }
}