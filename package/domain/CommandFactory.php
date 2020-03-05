<?php

namespace pebblip\domain;

use pebblip\domain\command\Add;
use pebblip\domain\command\Clr;
use pebblip\domain\command\Div;
use pebblip\domain\command\Mul;
use pebblip\domain\command\Quit;
use pebblip\domain\command\Sub;

class CommandFactory
{
    public static function create(string $command): Command
    {
        $command = strtoupper($command);
        switch ($command) {
            case 'ADD' :
                return new Add();
            case 'SUB' :
                return new Sub();
            case 'MUL' :
                return new Mul();
            case 'DIV' :
                return new Div();
            case 'CLR' :
                return new Clr();
            case 'QUIT' :
                return new Quit();
            default :
                throw new \InvalidArgumentException('not found command');
        }
    }
}
