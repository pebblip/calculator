<?php

namespace pebblip\domain;

interface Command
{
    public function execute(Environment $environment) : void;
}





