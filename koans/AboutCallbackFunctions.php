<?php

namespace Koans;

use KoansLib\KoansResources\Classes\Greeting;
use PHPUnit\Framework\TestCase;

// Resources for learning about callbacks => https://www.php.net/manual/en/language.types.callable.php
class AboutCallbackFunctions extends TestCase
{
    /**
     * @test
     * @testdox Callback functions can be invoked using the `call_user_func()` function and with parentheses
     */
    public function invokesCallbackFunction()
    {
        $callback = function ($name): string {
            return 'Hello, ' . $name . '!';
        };

        $invokesWithFunction = call_user_func($callback, 'John');
        $invokesWithParentheses = $callback('John');

        $this->assertEquals(__, $invokesWithFunction);
        $this->assertEquals(__, $invokesWithParentheses);
    }

    /**
     * @test
     * @testdox Callback functions can accept other functions as arguments
     */
    public function acceptsFunctionAsArgument()
    {
        $callback = function ($name, $greetingFunction): string {
            return $greetingFunction($name);
        };
        $greeting = function ($name): string {
            return 'Hello, ' . $name . '!';
        };

        $result = $callback('John', $greeting);

        $this->assertEquals(__, $result);
    }

    /**
     * @test
     * @testdox Callback functions can be defined as static methods of a class
     */
    public function definesStaticCallbackMethod()
    {
        $callback = [new Greeting(), 'greet'];

        $result = call_user_func($callback, 'John');

        $this->assertEquals(__, $result);
    }

    /**
     * @test
     * @testdox Callback functions can be defined as instance methods of an object
     */
    public function definesInstanceCallbackMethod()
    {
        $greeting = new Greeting();
        $callback = [$greeting, 'greet'];

        $result = $callback('John');

        $this->assertEquals(__, $result);
    }

    /**
     * @test
     * @testdox The `array_map()` function applies a callback function to each element of an array
     */
    public function usesArrayMapToChangeAnArrayUsingAFunction()
    {
        $numbers = [1, 2, 3, 4, 5];
        $callback = function ($number): int {
            return $number ** 2;
        };

        $result = array_map($callback, $numbers);

        $this->assertEquals(__, $result);
    }

    /**
     * @test
     * @testdox The implementation of the callback function can be passed to array_map() as an argument
     */
    public function usesArrayMapWithCallbackImplementationAsArgument()
    {
        $numbers = [1, 2, 3, 4, 5];

        $result = array_map(function ($number): int {
            return $number * 2;
        }, $numbers);

        $this->assertEquals(__, $result);
    }

    /**
     * @test
     * @testdox The `array_filter()` function filters elements of an array using a callback function
     */
    public function usesArrayFilterToFilterAnArrayUsingAFunction()
    {
        $numbers = [0 => 1, 1 => 2, 2 => 3, 3 => 4, 4 => 5];

        $result = array_filter($numbers, function ($number): int {
            return $number % 2 === 0;
        });

        $this->assertEquals(__, $result);
    }
}
