<?php

namespace Koans;

use PHPUnit\Framework\TestCase;

class AboutTrueAndFalseTest extends TestCase
{
    public function testTrueIsTreatedAsTrue()
    {
        $this->assertEquals(____, true);
    }

    public function testFalseIsTreatedAsFalse()
    {
        $this->assertEquals(__, false);
    }

    public function testNullIsTreatedAsFalseToo()
    {
        $this->assertEquals(__, null);
    }

    public function testEverythingElseIsTreatedAsTrue()
    {
        $this->assertEquals(__, 1);
        $this->assertEquals(__, "Strings");
        
    }

    public function testTheseAreFalse()
    {
        $this->assertEquals(__, 0);
        $this->assertEquals(__, "");
    }
}
