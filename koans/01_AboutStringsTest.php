<?php

namespace Koans;

use PHPUnit\Framework\TestCase;

class AboutStringsTest extends TestCase
{
    public function test_string_assignment()
    {
        $str = 'Hello';
        $this->assertEquals(__, $str);
    }

    public function test_string_concatenation()
    {
        $str = 'Hello ' . 'World';
        $this->assertEquals(__, $str);
    }

    public function test_string_interpolation()
    {
        $name = 'Porrapat';
        $this->assertEquals(__, "Hello $name");
    }
}