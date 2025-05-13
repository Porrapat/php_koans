<?php

namespace Koans;

use PHPUnit\Framework\TestCase;

class AboutTrueAndFalseTest extends TestCase
{
    public function testTrueIsTreatedAsTrue()
    {
        $this->assertEquals(true, true);
    }

    public function testFalseIsTreatedAsFalse()
    {
        $this->assertEquals(false, false);
    }

    public function testNullIsTreatedAsFalseToo()
    {
        $this->assertEquals(false, null);
    }

    public function testEverythingElseIsTreatedAsTrue()
    {
        $this->assertEquals(true, 1);
        $this->assertEquals(true, "Strings");
        
    }

    public function testTheseAreFalse()
    {
        $this->assertEquals(false, 0);
        $this->assertEquals(false, "");
    }
}
