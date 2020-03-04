<?php

namespace pebblip\domain\command;

use pebblip\domain\Command;
use pebblip\domain\Environment;

class Quit implements Command
{
    public function execute(Environment $environment): void
    {
        $environment->setRequestedQuit(true);
    }
}
