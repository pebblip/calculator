<?php

namespace pebblip\domain\command;

use pebblip\domain\Command;
use pebblip\domain\Environment;

class Clr implements Command
{
    public function execute(Environment $environment): void
    {
        $environment->setCurrentVal(0);
    }
}

