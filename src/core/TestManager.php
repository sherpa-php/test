<?php

namespace Sherpa\Test\core;

use ReflectionClass;
use ReflectionException;
use Sherpa\Sherpa\test\exceptions\InvalidTestClassException;
use Sherpa\Test\ui\ReportUI;

class TestManager
{
    public private(set) string $class;

    public function __construct(string $class)
    {
        $this->class = $class;
    }

    /**
     * @return array All test methods (having #Test tag)
     * @throws ReflectionException
     */
    private function getTestMethods(): array
    {
        $reflection = new ReflectionClass($this->class);
        $methods = $reflection->getMethods();

        $testMethods = [];

        foreach ($methods as $method)
        {
            $attributes = $method->getAttributes(SherpaTest::class);

            if (!empty($attributes))
            {
                $testMethods[] = $method->getName();
            }
        }

        return $testMethods;
    }


    /**
     * Launch a Sherpa test.
     * @throws InvalidTestClassException If provided class does
     *                                   not implement Test interface
     */
    public static function run(string $testClass): void
    {
        if (!is_subclass_of($testClass, Test::class))
        {
            throw new InvalidTestClassException($testClass);
        }

        $manager = new TestManager($testClass);
        $tests = $manager->getTestMethods();

        $instance = new $testClass();

        echo "<h1 style='
                    font-weight: 100; 
                    font-size: 3rem;
                  '>{$instance->name()}</h1>";

        echo "<p style='
                   font-size: 1.25rem; 
                   color: grey; 
                   margin-bottom: 50px;
                 '>$instance->description</p>";

        require_once __DIR__ . "/utils.php";

        $instance->startup();

        foreach ($tests as $test)
        {
            $instance->beforeEachTest();
            $instance->$test();
            $instance->afterEachTest();
        }

        $instance->end();
    }
}