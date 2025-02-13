<?php

namespace Sherpa\Test\ui;

use Sherpa\Ui\rendering\UI;

class ReportUI extends UI
{
    protected string $layoutPath
        = __DIR__ . "/rendering/report.html";

    protected ?string $stylesheetPath
        = __DIR__ . "/rendering/report.css";

    public function __construct()
    {
        parent::__construct("test", "Sherpa Test");
    }

    protected function props(): array
    {
        return [
            "Report" => [
                "State" => "success",
            ],
        ];
    }
}