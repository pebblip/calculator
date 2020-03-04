<?php

namespace Tests\pacakge\domain;

use pebblip\domain\Enum;
use Tests\TestCase;

class EnumTest extends TestCase
{
    /**
     * @test
     */
    function test() {

        self::assertEquals(Fruits::Apple(), Fruits::Apple());
        self::assertNotEquals(Fruits::Apple(), Fruits::Orange());

        Fruits::Apple;
    }

}

class Fruits {
    use Enum;

    const Apple = 1;
    const Orange = 2;
    const Grape = 3;
}
