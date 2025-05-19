<?php

namespace Koans;

use PHPUnit\Framework\TestCase;

class AboutEmptyIsNullOrIsset extends TestCase
{
    /**
     * @testdox is_null returns true only for null values
     */
    function testWorkingWithIsNull()
    {
        // is_null return true if variable is null
        $this->assertEquals(__, is_null(NULL));
        $this->assertEquals(__, is_null(""));
    }

    /**
     * @testdox isset returns true only for variables that are set and not null
     */
    function testWorkingWithIsset()
    {
        // isset return true if variable exist and it is not null
        $this->assertEquals(__, isset($something));

        $array = array('bar' => 1, 'foo' => null);
        $this->assertEquals(__, isset($array));
        $this->assertEquals(__ , isset($array['bar']));
        $this->assertEquals(__ , isset($array['foo']));
        $this->assertEquals(__ , isset($array['barfoo']));
    }

    /**
     * @testdox empty identifies values considered "empty" in PHP
     */
    function testWorkingWithEmpty()
    {
        // Working with numbers
        $this->assertEquals(__, empty(0));
        $this->assertEquals(__, empty(1));

        // Working with decimals
        $this->assertEquals(__, empty(0.0));
        $this->assertEquals(__, empty(0.1));

        // Working wiht strings
        $this->assertEquals(__, empty(""));
        $this->assertEquals(__, empty(" "));

        // Working with booleans
        $this->assertEquals(__, empty(false));
        $this->assertEquals(__, empty(true));

        // Working with arrays
        $this->assertEquals(__, empty(array()));
        $this->assertEquals(__, empty(array(1)));

        // Working with objects
        $this->assertEquals(__, empty((object)array()));
        $this->assertEquals(____, empty(null));
        $this->assertEquals(____, empty($something));
    }
}
