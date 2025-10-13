<?php

namespace Koans;

use KoansLib\KoansTestCase;

class AboutNull extends KoansTestCase
{
    /**
     * @testdox Explore null’s behavior with comparisons and casting
     */
    public function testNullHasSomeBehavior()
    {
        $this->assertTrue(null === null);
        $this->assertTrue(null == null);
        $this->assertTrue(is_null(null));
        $this->assertEquals("", (string) null);                 // Casting to string
        $this->assertEquals("NULL", var_export(null, true));    // PHP's inspect-like output
    }
}
