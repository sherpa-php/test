<?php

use Sherpa\Test\core\TestState;
use Sherpa\Test\ui\ReportUI;

function success(): void
{
    new ReportUI(TestState::SUCCESS)
        ->render("<p style='margin: 0; padding: 0;'>Test has succeeded.</p>");
}

function fail(): void
{
    new ReportUI(TestState::FAIL)
        ->render("<p style='margin: 0; padding: 0;'>Test has failed.</p>");
}