<?php

namespace Sherpa\Test\ui;

use Sherpa\Test\core\TestState;
use Sherpa\Ui\rendering\SpecialProperty;
use Sherpa\Ui\rendering\UI;

class ReportUI extends UI
{
    protected string $layoutPath
        = __DIR__ . "/rendering/report.html";

    protected ?string $stylesheetPath
        = __DIR__ . "/rendering/report.css";

    private string $state;

    public function __construct(TestState $state)
    {
        parent::__construct("test", "Sherpa Test");
    }

    protected function props(): array
    {
        return [
            "Report" => [
                "State" => "success",
            ],
            "Slot" => SpecialProperty::SLOT,
        ];
    }
}