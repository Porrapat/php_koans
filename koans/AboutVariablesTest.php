<?php

namespace Koans;

use PHPUnit\Framework\TestCase;

class AboutVariablesTest extends TestCase
{
    public function testAssigningVariables()
    {
        $value = "I am a string";
        $this->assertEquals(__, $value);
    }

    public function testIntegerValues()
    {
        $number = 42;
        $this->assertSame(__, $number);
    }
}