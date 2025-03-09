<?php

use Sherpa\Test\asserts\AssertBetween;
use Sherpa\Test\asserts\AssertFalse;
use Sherpa\Test\asserts\AssertIn;
use Sherpa\Test\asserts\AssertInterface;
use Sherpa\Test\asserts\AssertFalsy;
use Sherpa\Test\asserts\AssertTrue;
use Sherpa\Test\asserts\AssertTruly;
use Sherpa\Test\core\TestState;
use Sherpa\Test\ui\ReportUI;

const BACKTRACE_TEST_CLASS_INDEX = 2;

function success(?string $message = null): void
{
    if ($message === null)
    {
        $message = "Test has succeeded.";
    }

    $backtrace = debug_backtrace();

    new ReportUI(TestState::SUCCESS,
                 $backtrace[BACKTRACE_TEST_CLASS_INDEX]["file"],
                 $backtrace[BACKTRACE_TEST_CLASS_INDEX]["line"])
        ->render("<p style='margin: 0; padding: 0;'>$message</p>");
}

function fail(?string $error = null): void
{
    if ($error === null)
    {
        $error = "Test has failed.";
    }
    
    $backtrace = debug_backtrace();

    new ReportUI(TestState::FAIL,
                 $backtrace[BACKTRACE_TEST_CLASS_INDEX]["file"],
                 $backtrace[BACKTRACE_TEST_CLASS_INDEX]["line"])
        ->render("<p style='margin: 0; padding: 0;'>$error</p>");
}


/*
 * Assert Functions
 */

/**
 * Assert the value is truly.
 *
 * @param mixed $value
 * @param string|null $error (optional) error message
 */
function assertTruly(mixed $value, ?string $error = null): void
{
    ob_start();
    var_dump($value);
    $valueAsString = trim(ob_get_clean());

    $success = "<pre style='display: inline; font-style: italic; font-weight: 900;'>$valueAsString</pre> is truly.";
    $error = $error
        ?? "<pre style='display: inline; font-style: italic; font-weight: 900;'>$valueAsString</pre> 
            is not truly.";

    makeAssert(new AssertTruly($value), $success, $error);
}

/**
 * Assert the value is falsy.
 *
 * @param mixed $value
 * @param string|null $error (optional) error message
 */
function assertFalsy(mixed $value, ?string $error = null): void
{
    ob_start();
    var_dump($value);
    $valueAsString = trim(ob_get_clean());

    $success = "<pre style='display: inline; font-style: italic; font-weight: 900;'>$valueAsString</pre> is falsy.";
    $error = $error
        ?? "<pre style='display: inline; font-style: italic; font-weight: 900;'>$valueAsString</pre> is not falsy.";

    makeAssert(new AssertFalsy($value), $success, $error);
}

/**
 * Assert the value is truly.
 *
 * @param mixed $value
 * @param string|null $error (optional) error message
 */
function assertTrue(mixed $value, ?string $error = null): void
{
    ob_start();
    var_dump($value);
    $valueAsString = trim(ob_get_clean());

    $success = "<pre style='display: inline; font-style: italic; font-weight: 900;'>$valueAsString</pre> is truly.";
    $error = $error
        ?? "<pre style='display: inline; font-style: italic; font-weight: 900;'>$valueAsString</pre> is not truly.";

    makeAssert(new AssertTrue($value), $success, $error);
}

/**
 * Assert the value is falsy.
 *
 * @param mixed $value
 * @param string|null $error (optional) error message
 */
function assertFalse(mixed $value, ?string $error = null): void
{
    ob_start();
    var_dump($value);
    $valueAsString = trim(ob_get_clean());

    $success = "<pre style='display: inline; font-style: italic; font-weight: 900;'>$valueAsString</pre> is falsy.";
    $error = $error
        ?? "<pre style='display: inline; font-style: italic; font-weight: 900;'>$valueAsString</pre> is not falsy.";

    makeAssert(new AssertFalse($value), $success, $error);
}

/**
 * Assert the value is in the array.
 *
 * @param mixed $needle
 * @param array $haystack
 * @param string|null $error (optional) error message
 */
function assertIn(mixed $needle, array $haystack, ?string $error = null): void
{
    ob_start();
    var_dump($needle);
    $valueAsString = trim(ob_get_clean());

    $arrayAsString = implode(", ", $haystack);

    $success = "<pre style='display: inline; font-style: italic; font-weight: 900;'>$valueAsString</pre>
                is in [$arrayAsString].";

    $error = $error
        ?? "<pre style='display: inline; font-style: italic; font-weight: 900;'>$valueAsString</pre> 
            is not in [$arrayAsString].";

    makeAssert(new AssertIn($needle, $haystack), $success, $error);
}

/**
 * Assert the value is between the min and max values,
 * exclusively or inclusively.
 *
 * @param mixed $needle
 * @param int|float $min
 * @param int|float $max
 * @param bool $exclusive
 * @param string|null $error (optional) error message
 */
function assertBetween(mixed $needle, int|float $min, int|float $max, bool $exclusive = false, ?string $error = null): void
{
    ob_start();
    var_dump($needle);
    $valueAsString = trim(ob_get_clean());

    $exclusiveStateAsString = $exclusive
        ? "exclusively"
        : "inclusively";

    $success = "<pre style='display: inline; font-style: italic; font-weight: 900;'>$valueAsString</pre>
                is between $min and $max $exclusiveStateAsString.";

    $error = $error
        ?? "<pre style='display: inline; font-style: italic; font-weight: 900;'>$valueAsString</pre> 
            is not between $min and $max $exclusiveStateAsString.";

    makeAssert(new AssertBetween($needle, $min, $max, $exclusive), $success, $error);
}

/**
 * Prepare assert.
 *
 * @param AssertInterface $assert
 * @param string $success Success message
 * @param string $error Error message
 */
function makeAssert(AssertInterface $assert, string $success, string $error): void
{
    if ($assert->handle())
    {
        success($success);
    }
    else
    {
        fail($error);
    }
}