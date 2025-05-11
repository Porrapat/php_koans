<?php

namespace Koans;

use PHPUnit\Framework\TestCase;

if (!defined('__')) {
    define('__', null); // Placeholder for Koans
}

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

    // public function testEverythingElseIsTreatedAsTrue()
    // {
    //     $this->assertEquals(true, 1);
    //     $this->assertEquals(false, 0);
    //     $this->assertEquals(__, []);
    //     $this->assertEquals(__, new \stdClass());
    //     $this->assertEquals(__, "Strings");
    //     $this->assertEquals(__, "");
    // }
}
