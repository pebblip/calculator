<?php

namespace pebblip\domain\command;

use pebblip\domain\Command;
use pebblip\domain\Environment;

class Div implements Command
{
    public function execute(Environment $environment): void
    {
        if ($environment->getOprand(0) == 0) {
            throw new \InvalidArgumentException('cant divide by zero');
        }
        $environment->setCurrentVal($environment->getCurrentVal() / $environment->getOprand(0));
    }
}
