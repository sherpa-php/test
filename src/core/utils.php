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

    new ReportUI(TestState::SUCCESS)
        ->render("<p style='margin: 0; padding: 0;'>$message</p>");
}

function fail(?string $error = null): void
{
    if ($error === null)
    {
        $error = "Test has failed.";
    }

    new ReportUI(TestState::FAIL)
        ->render("<p style='margin: 0; padding: 0;'>$error</p>");
}


/*
 * Assert Functions
 */

function assertTruly(mixed $value, ?string $error = null): void
{
    if (new AssertTruly($value)->handle())
    {
        success("<code>$value</code> is truly.");
    }
    else
    {
        fail($error ?? "<code>$value</code> is not truly.");
    }
}