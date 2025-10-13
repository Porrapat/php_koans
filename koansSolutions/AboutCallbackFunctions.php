<?php

namespace Koans;

use KoansLib\KoansTestCase;
use KoansLib\KoansResources\Classes\Greeting;

// Resources for learning about callbacks => https://www.php.net/manual/en/language.types.callable.php
class AboutCallbackFunctions extends KoansTestCase
{
    /**
     * @testdox Callback functions can be invoked using the `call_user_func()` function and with parentheses
     */
    public function testInvokesCallbackFunction()
    {
        $callback = function ($name): string {
            return 'Hello, ' . $name . '!';
        };

        $invokesWithFunction = call_user_func($callback, 'John');
        $invokesWithParentheses = $callback('John');

        $this->assertEquals('Hello, John!', $invokesWithFunction);
        $this->assertEquals('Hello, John!', $invokesWithParentheses);
    }

    /**
     * @testdox Callback functions can accept other functions as arguments
     */
    public function testAcceptsFunctionAsArgument()
    {
        $callback = function ($name, $greetingFunction): string {
            return $greetingFunction($name);
        };
        $greeting = function ($name): string {
            return 'Hello, ' . $name . '!';
        };

        $result = $callback('John', $greeting);

        $this->assertEquals('Hello, John!', $result);
    }

    /**
     * @testdox Callback functions can be defined as static methods of a class
     */
    public function testDefinesStaticCallbackMethod()
    {
        $callback = [new Greeting(), 'greet'];

        $result = call_user_func($callback, 'John');

        $this->assertEquals('Hello, John!', $result);
    }

    /**
     * @testdox Callback functions can be defined as instance methods of an object
     */
    public function testDefinesInstanceCallbackMethod()
    {
        $greeting = new Greeting();
        $callback = [$greeting, 'greet'];

        $result = $callback('John');

        $this->assertEquals('Hello, John!', $result);
    }

    /**
     * @testdox The `array_map()` function applies a callback function to each element of an array
     */
    public function testUsesArrayMapToChangeAnArrayUsingAFunction()
    {
        $numbers = [1, 2, 3, 4, 5];
        $callback = function ($number): int {
            return $number ** 2;
        };

        $result = array_map($callback, $numbers);

        $this->assertEquals([1, 4, 9, 16, 25], $result);
    }

    /**
     * @testdox The implementation of the callback function can be passed to array_map() as an argument
     */
    public function testUsesArrayMapWithCallbackImplementationAsArgument()
    {
        $numbers = [1, 2, 3, 4, 5];

        $result = array_map(function ($number): int {
            return $number * 2;
        }, $numbers);

        $this->assertEquals([2, 4, 6, 8, 10], $result);
    }

    /**
     * @testdox The `array_filter()` function filters elements of an array using a callback function
     */
    public function testUsesArrayFilterToFilterAnArrayUsingAFunction()
    {
        $numbers = [0 => 1, 1 => 2, 2 => 3, 3 => 4, 4 => 5];

        $result = array_filter($numbers, function ($number): int {
            return $number % 2 === 0;
        });

        $this->assertEquals([1 => 2, 3 => 4], $result);
    }
}
