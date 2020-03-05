<?php

namespace pebblip\domain\command;

use pebblip\domain\Command;
use pebblip\domain\Environment;

class Add implements Command
{
    public function execute(Environment $environment): void
    {
        $environment->setCurrentVal($environment->getCurrentVal() + $environment->getOprand(0));
    }
}
