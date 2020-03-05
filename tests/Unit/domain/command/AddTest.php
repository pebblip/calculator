<?php

namespace Tests\domain\command;

use pebblip\domain\command\Add;
use pebblip\domain\Environment;
use Tests\TestCase;

class AddTest extends TestCase
{

    /**
     * @test
     */
    public function 足し算できること()
    {
        $e = new Environment();
        $e->setCurrentVal(100);
        $e->setOprands([1]);

        $sut = new Add();
        $sut->execute($e);

        $this->assertEquals(101, $e->getCurrentVal());
    }
}
