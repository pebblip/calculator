<?php

namespace Tests\domain\command;

use pebblip\domain\command\Sub;
use pebblip\domain\Environment;
use Tests\TestCase;

class SubTest extends TestCase
{

    /**
     * @test
     */
    public function 引き算できること()
    {
        $e = new Environment();
        $e->setCurrentVal(100);
        $e->setOprands([1]);

        $sut = new Sub();
        $sut->execute($e);

        $this->assertEquals(99, $e->getCurrentVal());
    }
}
