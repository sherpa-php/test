<?php

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

    new ReportUI(TestState::SUCCESS, $backtrace[0]["file"], $backtrace[0]["line"])
        ->render("<p style='margin: 0; padding: 0;'>$message</p>");
}

function fail(?string $error = null): void
{
    if ($error === null)
    {
        $error = "Test has failed.";
    }
    
    $backtrace = debug_backtrace();

    new ReportUI(TestState::FAIL, $backtrace[0]["file"], $backtrace[0]["line"])
        ->render("<p style='margin: 0; padding: 0;'>$error</p>");
}


/*
 * Assert Functions
 */

function assertTruly(mixed $value, ?string $error = null): void
{
    ob_start();
    var_dump($value);
    $valueAsString = trim(ob_get_clean());

    if (new AssertTruly($value)->handle())
    {
        success("<pre style='display: inline; font-style: italic; font-weight: 900;'>$valueAsString</pre> is truly.");
    }
    else
    {
        fail($error
            ?? "<pre style='display: inline; font-style: italic; font-weight: 900;'>$valueAsString</pre> is not truly.");
    }
}