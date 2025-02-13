<?php

use Sherpa\Test\core\TestState;
use Sherpa\Test\ui\ReportUI;

function success(): void
{
    new ReportUI(TestState::SUCCESS)
        ->render("<p>Test has succeeded.</p>");
}

function fail(): void
{
    new ReportUI(TestState::FAIL)
        ->render("<p>Test has failed.</p>");
}