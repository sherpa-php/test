<?php

namespace Sherpa\Test\core;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class SherpaTest
{
    public private(set) ?string $name;

    public function __construct(?string $name = null)
    {
        $this->name = $name;
    }
}