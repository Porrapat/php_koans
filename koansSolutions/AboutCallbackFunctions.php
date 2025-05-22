<?php

namespace Koans;

use Koans\koansResources\Classes\Greeting;
use PHPUnit\Framework\TestCase;

// Resources for learning about callbacks => https://www.php.net/manual/en/language.types.callable.php
class AboutCallbackFunctions extends TestCase
{
    /**
     * @test
     * @testdox Callback functions can be defined as static methods of a class
     */
    public function definesStaticCallbackMethod()
    {
        $callback = [new Greeting(), 'greet'];

        $result = call_user_func($callback, 'John');

        $this->assertEquals('Hello, John!', $result);
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

        $this->assertEquals('Hello, John!', $result);
    }
}
