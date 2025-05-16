<?php

namespace Koans;

use PHPUnit\Framework\TestCase;
use stdClass;

// Resources for learning about Data Types => https://www.w3schools.com/php/php_datatypes.asp
class AboutDataTypes extends TestCase
{
    /**
     * @test
     * @testdox A string is a data type that is used to represent text
     */
    public function createsStringUsingSingleOrDoubleQuotes()
    {
        $string = '3';

        $this->assertTrue(is_string($string));
    }

    /**
     * @test
     * @testdox Integers are numbers without decimals
     */
    public function createsIntUsingNumbersWithoutDecimals()
    {
        $integer = 3;

        $this->assertTrue(is_int($integer));
    }

    /**
     * @test
     * @testdox Floats are numbers with decimal points
     */
    public function createsFloatUsingNumbersWithDecimalPoints()
    {
        $float = 1.1;

        $this->assertTrue(is_float($float));
    }

    /**
     * @test
     * @testdox Booleans represent true or false values
     */
    public function createsBooleansUsingTrueOrFalse()
    {
        $booleanTrue = true;
        $booleanFalse = false;

        $this->assertEquals(true, $booleanTrue);
        $this->assertEquals(false, $booleanFalse);
        $this->assertEquals(true, is_bool($booleanTrue));
        $this->assertEquals(true, is_bool($booleanFalse));
    }

    /**
     * @test
     * @testdox Arrays can hold multiple values
     */
    public function createsArrayUsingBracketsOrArrayKeyword()
    {
        $array = [1, 2, 3];

        $this->assertEquals([1,2,3], $array);
        $this->assertEquals(true, is_array($array));
    }

    /**
     * @test
     * @testdox Objects are instances of classes
     */
    public function createsObjectsUsingNewKeyword()
    {
        $object = new stdClass();

        $this->assertEquals(true, is_object($object));
    }

    /**
     * @test
     * @testdox Null represents the absence of a value
     */
    public function createNullUsingNullKeyword()
    {
        $null = null;

        $this->assertEquals(true, is_null($null));
    }

    /**
     * @test
     * @testdox Resources represent external resources (e.g., database connections, files...)
     */
    public function checksIfOurComposerFileIsAResource()
    {
        $resource = fopen('composer.json', 'r');

        $this->assertEquals(true, is_resource($resource));

        fclose($resource);
    }
}
