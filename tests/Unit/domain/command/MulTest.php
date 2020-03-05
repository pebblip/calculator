<?php

namespace Tests\domain\command;

use pebblip\domain\command\Mul;
use pebblip\domain\Environment;
use Tests\TestCase;

class MulTest extends TestCase
{

    /**
     * @test
     */
    public function 掛け算できること()
    {
        $e = new Environment();
        $e->setCurrentVal(100);
        $e->setOprands([2]);

        $sut = new Mul();
        $sut->execute($e);

        $this->assertEquals(200, $e->getCurrentVal());
    }
}
