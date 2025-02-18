<?php

use Sherpa\Test\asserts\AssertInterface;
use Sherpa\Test\asserts\AssertFalsy;
use Sherpa\Test\asserts\AssertTruly;
use Sherpa\Test\core\TestState;
use Sherpa\Test\ui\ReportUI;

function success(?string $message = null): void
{
    if ($message === null)
    {
        $message = "Test has succeeded.";
    }

    $backtrace = debug_backtrace();

    new ReportUI(TestState::SUCCESS, $backtrace[1]["file"], $backtrace[1]["line"])
        ->render("<p style='margin: 0; padding: 0;'>$message</p>");
}

function fail(?string $error = null): void
{
    if ($error === null)
    {
        $error = "Test has failed.";
    }
    
    $backtrace = debug_backtrace();

    new ReportUI(TestState::FAIL, $backtrace[1]["file"], $backtrace[1]["line"])
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

    if (new AssertFalsy($value)->handle())
    {
        success($success);
    }
    else
    {
        fail($error);
    }
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

    if (new AssertTruly($value)->handle())
    {
        success($success);
    }
    else
    {
        fail($error);
    }
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

    if (new AssertFalsy($value)->handle())
    {
        success($success);
    }
    else
    {
        fail($error);
    }
}

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