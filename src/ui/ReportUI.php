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
    private ?string $file;
    private ?int $line;

    public function __construct(TestState $state, ?string $file = null, ?int $line = null)
    {
        parent::__construct("test", "Sherpa Test");

        $this->state = $state->value;
        $this->file = $file;
        $this->line = $line;
    }

    protected function props(): array
    {
        return [
            "Report" => [
                "State" => $this->state,
            ],
            "Backtrace" => [
                "File" => $this->file ?? "Unknown File",
                "Line" => $this->line ?? "",
            ],
            "Slot" => SpecialProperty::SLOT,
        ];
    }
}