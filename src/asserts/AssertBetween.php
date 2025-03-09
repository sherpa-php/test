<?php

namespace Sherpa\Test\asserts;

use Sherpa\Test\asserts\Assert;
use Sherpa\Test\asserts\AssertInterface;

/**
 * Assert Between
 * <p>
 *     Verify if the provided value is
 *     between provided min and max values,
 *     exclusively or inclusively.
 * </p>
 */
class AssertBetween
    extends Assert
    implements AssertInterface
{
    public private(set) int|float $needle;
    public private(set) int|float $min;
    public private(set) int|float $max;
    public private(set) bool $exclusive;

    public function __construct(
        int|float $needle,
        int|float $min,
        int|float $max,
        bool $exclusive = false)
    {
        $this->needle = $needle;
        $this->min = $min;
        $this->max = $max;
        $this->exclusive = $exclusive;
    }

    public function handle(): bool
    {
        return $this->exclusive
            ? $this->needle > $this->min && $this->needle < $this->max
            : $this->needle >= $this->min && $this->needle <= $this->max;
    }
}