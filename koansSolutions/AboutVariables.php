<?php

namespace Koans;

use PHPUnit\Framework\TestCase;

class AboutVariables extends TestCase
{
    /**
     * @testdox This is string variable
     */
    public function testAssigningVariables()
    {
        $value = "I am a string";
        $this->assertEquals("I am a string", $value);
    }

    /**
     * @testdox This is int variable
     */
    public function testIntegerValues()
    {
        $number = 42;
        $this->assertSame(42, $number);
    }
}