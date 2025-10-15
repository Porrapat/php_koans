<?php

namespace Koans;

use KoansLib\KoansTestCase;

function is_even(int $number): bool
{
    return $number % 2 === 0;
}

/**
 * @testdox Write the function that check it is even number or not
 */
class AboutIsEvenMiniProject extends KoansTestCase
{
    /**
     * @testdox Is even number
     */
    public function testIsEvenNumber(): void
    {
        $this->assertTrue(is_even(0));
        $this->assertTrue(is_even(2));
        $this->assertTrue(is_even(200));
        $this->assertTrue(is_even(5000));
        $this->assertTrue(is_even(1000000));
        $this->assertTrue(is_even(-4));
        $this->assertTrue(is_even(-400));
        $this->assertTrue(is_even(-1000));
        $this->assertTrue(is_even(-100000));
    }

    /**
     * @testdox Is odd number
     */
    public function testIsOddNumber(): void
    {
        $this->assertFalse(is_even(1));
        $this->assertFalse(is_even(3));
        $this->assertFalse(is_even(101));
        $this->assertFalse(is_even(301));
        $this->assertFalse(is_even(100001));
        $this->assertFalse(is_even(-1));
        $this->assertFalse(is_even(-100001));
    }
}
