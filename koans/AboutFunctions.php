<?php

namespace Koans;

use KoansLib\KoansTestCase;

// Resources for learning about Functions => https://www.w3schools.com/php/php_functions.asp
class AboutFunctions extends KoansTestCase
{
    /**
     * @test
     * @testdox Functions can be defined using the 'function' keyword
     */
    public function usesFunctionKeywordToDefineFunctions()
    {
        function sayHello(): string
        {
            return 'Hello, world!';
        }

        $this->assertEquals(__, sayHello());
    }

    /**
     * @test
     * @testdox Functions can have arguments
     */
    public function usesFunctionsArgumentsToPassInformationToFunctions()
    {
        function add($variableOne, $variableTwo): int
        {
            return $variableOne + $variableTwo;
        }

        $this->assertEquals(__, add(2, 3));
    }

    /**
     * @test
     * @testdox Functions can have default argument values
     */
    public function usesDefaultArgumentsValues()
    {
        function greet($name = 'Guest'): string
        {
            return 'Hello, ' . $name . '!';
        }

        $result1 = greet();
        $result2 = greet('John');

        $this->assertEquals(__, $result1);
        $this->assertEquals(__, $result2);
    }

    /**
     * @test
     * @testdox Functions can return multiple values using an array or list
     */
    public function usesMultipleReturnToReturnMultipleValues()
    {
        function getFullName(): array
        {
            $firstName = 'John';
            $lastName = 'Doe';

            return [$firstName, $lastName];
        }

        list($firstName, $lastName) = getFullName();

        $this->assertEquals(__, $firstName);
        $this->assertEquals(__, $lastName);
    }

    /**
     * @test
     * @testdox Functions can be recursive
     */
    public function usesRecursionToCallTheFunctionInsideIt()
    {
        function factorial($number): int
        {
            if ($number === 0) {
                return 1;
            }
            return $number * factorial($number - 1);
        }

        $result = factorial(5);

        $this->assertEquals(__, $result);
    }
}
