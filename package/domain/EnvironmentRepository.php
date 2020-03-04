<?php

namespace pebblip\domain;

interface EnvironmentRepository
{
    public function get(): Environment;
}
