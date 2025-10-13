<?php

namespace Koans;

use KoansLib\KoansTestCase;

// Resources for learning about Functions => https://www.w3schools.com/php/php_functions.asp
class AboutFunctions extends KoansTestCase
{
    /**
     * @testdox Functions can be defined using the 'function' keyword
     */
    public function testUsesFunctionKeywordToDefineFunctions()
    {
        function sayHello(): string
        {
            return 'Hello, world!';
        }

        $this->assertEquals('Hello, world!', sayHello());
    }

    /**
     * @testdox Functions can have arguments
     */
    public function testUsesFunctionsArgumentsToPassInformationToFunctions()
    {
        function add($variableOne, $variableTwo): int
        {
            return $variableOne + $variableTwo;
        }

        $this->assertEquals(5, add(2, 3));
    }

    /**
     * @testdox Functions can have default argument values
     */
    public function testUsesDefaultArgumentsValues()
    {
        function greet($name = 'Guest'): string
        {
            return 'Hello, ' . $name . '!';
        }

        $result1 = greet();
        $result2 = greet('John');

        $this->assertEquals('Hello, Guest!', $result1);
        $this->assertEquals('Hello, John!', $result2);
    }

    /**
     * @testdox Functions can return multiple values using an array or list
     */
    public function testUsesMultipleReturnToReturnMultipleValues()
    {
        function getFullName(): array
        {
            $firstName = 'John';
            $lastName = 'Doe';

            return [$firstName, $lastName];
        }

        list($firstName, $lastName) = getFullName();

        $this->assertEquals('John', $firstName);
        $this->assertEquals('Doe', $lastName);
    }

    /**
     * @testdox Functions can be recursive
     */
    public function testUsesRecursionToCallTheFunctionInsideIt()
    {
        function factorial($number): int
        {
            if ($number === 0) {
                return 1;
            }
            return $number * factorial($number - 1);
        }

        $result = factorial(5);

        $this->assertEquals(120, $result);
    }
}
