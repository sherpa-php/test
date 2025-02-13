<?php

namespace Sherpa\Test\core;

interface Test
{
    /**
     * On Startup event method.
     */
    public function startup(): void;

    /**
     * On Before each test event method.
     */
    public function beforeEachTest(): void;

    /**
     * On During Test event method.
     */
    public function handle(): void;

    /**
     * On After each test event method.
     */
    public function afterEachTest(): void;

    /**
     * On Ending event method.
     */
    public function end(): void;
}