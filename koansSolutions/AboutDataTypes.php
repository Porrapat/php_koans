<?php

namespace Koans;

use KoansLib\KoansTestCase;
use stdClass;

// Resources for learning about Data Types => https://www.w3schools.com/php/php_datatypes.asp
class AboutDataTypes extends KoansTestCase
{
    /**
     * @testdox A string is a data type that is used to represent text
     */
    public function testCreatesStringUsingSingleOrDoubleQuotes()
    {
        $string = '3';

        $this->assertTrue(is_string($string));
    }

    /**
     * @testdox Integers are numbers without decimals
     */
    public function testCreatesIntUsingNumbersWithoutDecimals()
    {
        $integer = 3;

        $this->assertTrue(is_int($integer));
    }

    /**
     * @testdox Floats are numbers with decimal points
     */
    public function testCreatesFloatUsingNumbersWithDecimalPoints()
    {
        $float = 1.1;

        $this->assertTrue(is_float($float));
    }

    /**
     * @testdox Booleans represent true or false values
     */
    public function testCreatesBooleansUsingTrueOrFalse()
    {
        $booleanTrue = true;
        $booleanFalse = false;

        $this->assertEquals(true, $booleanTrue);
        $this->assertEquals(false, $booleanFalse);
        $this->assertEquals(true, is_bool($booleanTrue));
        $this->assertEquals(true, is_bool($booleanFalse));
    }

    /**
     * @testdox Arrays can hold multiple values
     */
    public function testCreatesArrayUsingBracketsOrArrayKeyword()
    {
        $array = [1, 2, 3];

        $this->assertEquals([1,2,3], $array);
        $this->assertEquals(true, is_array($array));
    }

    /**
     * @testdox Objects are instances of classes
     */
    public function testCreatesObjectsUsingNewKeyword()
    {
        $object = new stdClass();

        $this->assertEquals(true, is_object($object));
    }

    /**
     * @testdox Null represents the absence of a value
     */
    public function testCreateNullUsingNullKeyword()
    {
        $null = null;

        $this->assertEquals(true, is_null($null));
    }

    /**
     * @testdox Resources represent external resources (e.g., database connections, files...)
     */
    public function testChecksIfOurComposerFileIsAResource()
    {
        $resource = fopen('composer.json', 'r');

        $this->assertEquals(true, is_resource($resource));

        fclose($resource);
    }
}
