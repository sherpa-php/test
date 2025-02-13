<?php

namespace Sherpa\Test\core;

abstract class Test
{
    public protected(set) ?string $name = null;

    /**
     * On Startup event method.
     */
    public abstract function startup(): void;

    /**
     * On Before each test event method.
     */
    public abstract function beforeEachTest(): void;

    /**
     * On After each test event method.
     */
    public abstract function afterEachTest(): void;

    /**
     * On Ending event method.
     */
    public abstract function end(): void;

    /**
     * @return string Test class' name
     */
    public function name(): string
    {
        return $this->name
            ?? basename('\\', '/', static::class);
    }
}