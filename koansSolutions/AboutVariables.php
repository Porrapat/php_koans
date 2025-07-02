<?php

namespace Koans;

use PHPUnit\Framework\TestCase;

// Resources for learning about PHP variable => https://www.w3schools.com/php/php_variables.asp
class AboutVariables extends TestCase
{
    /**
     * @testdox This is string variable
     */
    public function testAssigningVariables()
    {
        $value = "I am a string";
        $this->assertEquals("I am a string", $value);
    }

    /**
     * @testdox This is int variable
     */
    public function testIntegerValues()
    {
        $number = 42;
        $this->assertSame(42, $number);
    }

    /**
     * @testdox A float holds decimal values
     */
    public function testFloatVariable()
    {
        $pi = 3.14;
        $this->assertIsFloat($pi);
        $this->assertEquals(3.14, $pi);
    }

    /**
     * @testdox A boolean can be true or false
     */
    public function testBooleanVariable()
    {
        $isTrue = true;
        $isFalse = false;

        $this->assertTrue(true);
        $this->assertFalse(false);
    }

    /**
     * @testdox An array can hold multiple values
     */
    public function testArrayVariable()
    {
        $array = [1, 2, 3];
        $this->assertIsArray($array);
        $this->assertEquals([1, 2, 3], $array);
    }

    /**
     * @testdox Null means the absence of a value
     */
    public function testNullVariable()
    {
        $nothing = null;
        $this->assertNull(null);
    }

    /**
     * @testdox An object is an instance of a class
     */
    public function testObjectVariable()
    {
        $object = new \stdClass();
        $object->language = "PHP";

        $this->assertIsObject($object);
        $this->assertEquals('PHP', $object->language);
    }

    /**
     * @testdox A type of variable
     */
    public function testATypeOfVariable()
    {
        $this->assertEquals('integer', gettype(42));
        $this->assertEquals('double', gettype(3.14)); // use 'double' instead of 'float'
        $this->assertEquals('string', gettype("Hello"));
        $this->assertEquals('boolean', gettype(true));
        $this->assertEquals('NULL', gettype(null));
        $this->assertEquals('array', gettype([1, 2, 3]));
        $this->assertEquals('object', gettype(new \stdClass()));
        
        $fp = fopen('php://temp', 'r');
        $this->assertEquals('resource', gettype($fp));
        fclose($fp);
    }
}