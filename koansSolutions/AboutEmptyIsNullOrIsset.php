<?php

namespace Koans;

use PHPUnit\Framework\TestCase;

class AboutEmptyIsNullOrIsset extends TestCase
{
    function testWorkingWithIsNull()
    {
        // is_null return true if variable is null
        $this->assertEquals(true, is_null(NULL));
        $this->assertEquals(false, is_null(""));
    }

    function testWorkingWithIsset()
    {
        // isset return true if variable exist and it is not null
        $this->assertEquals(false, isset($something));

        $array = array('bar' => 1, 'foo' => null);
        $this->assertEquals(true, isset($array));
        $this->assertEquals(true , isset($array['bar']));
        $this->assertEquals(false , isset($array['foo']));
        $this->assertEquals(false , isset($array['barfoo']));
    }

    function testWorkingWithEmpty()
    {
        // Working with numbers
        $this->assertEquals(true, empty(0));
        $this->assertEquals(false, empty(1));

        // Working with decimals
        $this->assertEquals(true, empty(0.0));
        $this->assertEquals(false, empty(0.1));

        // Working wiht strings
        $this->assertEquals(true, empty(""));
        $this->assertEquals(false, empty(" "));

        // Working with booleans
        $this->assertEquals(true, empty(false));
        $this->assertEquals(false, empty(true));

        // Working with arrays
        $this->assertEquals(true, empty(array()));
        $this->assertEquals(false, empty(array(1)));

        // Working with objects
        $this->assertEquals(false, empty((object)array()));
        $this->assertEquals(true, empty(null));
        $this->assertEquals(true, empty($something));
    }
}
