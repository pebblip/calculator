<?php

namespace Tests\domain\command;

use pebblip\domain\command\Div;
use pebblip\domain\Environment;
use Tests\TestCase;

class DivTest extends TestCase
{

    /**
     * @test
     */
    public function 割り算できること()
    {
        $e = new Environment();
        $e->setCurrentVal(100);
        $e->setOprands([2]);

        $sut = new Div();
        $sut->execute($e);

        $this->assertEquals(50, $e->getCurrentVal());
    }

    /**
     * @test
     */
    public function ゼロで割ると例外になること()
    {
        $e = new Environment();
        $e->setCurrentVal(100);
        $e->setOprands([0]);

        $this->expectException(\InvalidArgumentException::class);

        $sut = new Div();
        $sut->execute($e);


    }
}
