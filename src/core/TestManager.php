<?php

namespace Sherpa\Test\core;

use Sherpa\Sherpa\test\exceptions\InvalidTestClassException;

class TestManager
{
    /**
     * Launch Sherpa Test startup script file.
     * @throws InvalidTestClassException If provided class does
     *                          not implement Test interface
     */
    public static function run(string $testClass): void
    {
        if (!in_array(Test::class, class_implements($testClass)))
        {
            throw new InvalidTestClassException($testClass);
        }
    }
}