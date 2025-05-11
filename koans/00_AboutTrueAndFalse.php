<?php

namespace Koans;

use PHPUnit\Framework\TestCase;

if (!defined('__')) {
    define('__', null); // Placeholder for Koans
}

class AboutTrueAndFalseTest extends TestCase
{
    private function truthValue($condition)
    {
        if ($condition) {
            return 'true_stuff';
        } else {
            return 'false_stuff';
        }
    }

    public function testTrueIsTreatedAsTrue()
    {
        $this->assertEquals(__, $this->truthValue(true));
    }

    public function testFalseIsTreatedAsFalse()
    {
        $this->assertEquals(__, $this->truthValue(false));
    }

    public function testNullIsTreatedAsFalseToo()
    {
        $this->assertEquals(__, $this->truthValue(null));
    }

    public function testEverythingElseIsTreatedAsTrue()
    {
        $this->assertEquals(__, $this->truthValue(1));
        $this->assertEquals(__, $this->truthValue(0));
        $this->assertEquals(__, $this->truthValue([]));
        $this->assertEquals(__, $this->truthValue(new \stdClass()));
        $this->assertEquals(__, $this->truthValue("Strings"));
        $this->assertEquals(__, $this->truthValue(""));
    }
}
