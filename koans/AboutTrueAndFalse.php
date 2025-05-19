<?php

namespace Koans;

use PHPUnit\Framework\TestCase;

class AboutTrueAndFalseTest extends TestCase
{
    /**
     * @testdox true is treated as true
     */
    public function testTrueIsTreatedAsTrue()
    {
        $this->assertEquals(____, true);
    }

    /**
     * @testdox false is treated as false
     */
    public function testFalseIsTreatedAsFalse()
    {
        $this->assertEquals(__, false);
    }

    /**
     * @testdox null is treated as false too
     */
    public function testNullIsTreatedAsFalseToo()
    {
        $this->assertEquals(__, null);
    }

    /**
     * @testdox most other values like 1 and strings are treated as true
     */
    public function testEverythingElseIsTreatedAsTrue()
    {
        $this->assertEquals(__, 1);
        $this->assertEquals(__, "Strings");
        
    }

    /**
     * @testdox 0 and empty string are also treated as false
     */
    public function testTheseAreFalse()
    {
        $this->assertEquals(__, 0);
        $this->assertEquals(__, "");
    }
}
