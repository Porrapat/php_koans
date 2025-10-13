<?php

namespace Koans;

use KoansLib\KoansTestCase;

// Resources for learning about PHP variable => https://www.w3schools.com/php/php_variables.asp
class AboutVariables extends KoansTestCase
{
    /**
     * @testdox This is string variable
     */
    public function testAssigningVariables()
    {
        $value = "I am a string";
        $this->assertEquals(__, $value);
    }

    /**
     * @testdox This is int variable
     */
    public function testIntegerValues()
    {
        $number = 42;
        $this->assertSame(__, $number);
    }

    /**
     * @testdox A float holds decimal values
     */
    public function testFloatVariable()
    {
        $pi = 3.14;
        $this->assertIsFloat($pi);
        $this->assertEquals(__, $pi);
    }

    /**
     * @testdox A boolean can be true or false
     */
    public function testBooleanVariable()
    {
        $isTrue = true;
        $isFalse = false;

        $this->assertTrue(__);
        $this->assertFalse(____);
    }

    /**
     * @testdox An array can hold multiple values
     */
    public function testArrayVariable()
    {
        $array = [1, 2, 3];
        $this->assertIsArray($array);
        $this->assertEquals(__, $array);
    }

    /**
     * @testdox Null means the absence of a value
     */
    public function testNullVariable()
    {
        $nothing = null;
        $this->assertNull(__);
    }

    /**
     * @testdox An object is an instance of a class
     */
    public function testObjectVariable()
    {
        $object = new \stdClass();
        $object->language = "PHP";

        $this->assertIsObject($object);
        $this->assertEquals(__, $object->language);
    }

    /**
     * @testdox A type of variable
     */
    public function testATypeOfVariable()
    {
        $this->assertEquals(__, gettype(42));
        $this->assertEquals(__, gettype(3.14)); // use 'double' instead of 'float'
        $this->assertEquals(__, gettype("Hello"));
        $this->assertEquals(__, gettype(true));
        $this->assertEquals(__, gettype(null));
        $this->assertEquals(__, gettype([1, 2, 3]));
        $this->assertEquals(__, gettype(new \stdClass()));
        
        $fp = fopen('php://temp', 'r');
        $this->assertEquals(__, gettype($fp));
        fclose($fp);
    }
}