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
        $string = 3;

        $this->assertTrue(is_string($string));
    }

    /**
     * @test
     * @testdox Integers are numbers without decimals
     */
    public function createsIntUsingNumbersWithoutDecimals()
    {
        $integer = 'I want to be an int';

        $this->assertTrue(is_int($integer));
    }

    /**
     * @test
     * @testdox Floats are numbers with decimal points
     */
    public function createsFloatUsingNumbersWithDecimalPoints()
    {
        $float = 1;

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

        $this->assertEquals(__, $booleanTrue);
        $this->assertEquals(__, $booleanFalse);
        $this->assertEquals(__, is_bool($booleanTrue));
        $this->assertEquals(__, is_bool($booleanFalse));
    }

    /**
     * @test
     * @testdox Arrays can hold multiple values
     */
    public function createsArrayUsingBracketsOrArrayKeyword()
    {
        $array = [1, 2, 3];

        $this->assertEquals(__, $array);
        $this->assertEquals(__, is_array($array));
    }

    /**
     * @test
     * @testdox Objects are instances of classes
     */
    public function createsObjectsUsingNewKeyword()
    {
        $object = new stdClass();

        $this->assertEquals(____, is_object($object));
    }

    /**
     * @test
     * @testdox Null represents the absence of a value
     */
    public function createsNullUsingNullKeyword()
    {
        $null = null;

        $this->assertEquals(____, is_null($null));
    }

    /**
     * @test
     * @testdox Resources represent external resources (e.g., database connections, files...)
     */
    public function checksIfOurComposerFileIsAResource()
    {
        $resource = fopen('composer.json', 'r');

        $this->assertEquals(____, is_resource($resource));

        fclose($resource);
    }
}
