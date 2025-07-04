<?php

namespace Koans;
use PHPUnit\Framework\TestCase;

// FizzBuzz Project

// FizzBuzz is a classic programming exercise and word game,
// often used in coding interviews to assess basic programming skills.
//
// Rules:
// - If a number is divisible by 3, return "Fizz"
// - If a number is divisible by 5, return "Buzz"
// - If a number is divisible by both 3 and 5, return "FizzBuzz"
// - Otherwise, return the number itself as a PHP string
//
// This simple challenge is widely used to evaluate a developer's
// understanding of control flow, loops, and conditional statements.

function fizzBuzz($number): string
{
    // Write FizzBuzz function here.
    return __;
}

class AboutFizzBuzzProject extends TestCase
{
    /**
     * @testdox Fizz buzz returns number in form of PHP String
     */
    public function testFizzBuzzReturnsNumberInFormOfPHPString()
    {
        $this->assertEquals('1', fizzBuzz(1));
        $this->assertEquals('2', fizzBuzz(2));
        $this->assertEquals('4', fizzBuzz(4));
        $this->assertEquals('7', fizzBuzz(7));
        $this->assertEquals('8', fizzBuzz(8));
    }

    /**
     * @testdox Fizz buzz returns fizz for multiples of 3
     */
    public function testFizzBuzzReturnsFizzForMultiplesOf3()
    {
        $this->assertEquals('Fizz', fizzBuzz(3));
        $this->assertEquals('Fizz', fizzBuzz(6));
        $this->assertEquals('Fizz', fizzBuzz(9));
        $this->assertEquals('Fizz', fizzBuzz(12));
        $this->assertEquals('Fizz', fizzBuzz(96));
        $this->assertEquals('Fizz', fizzBuzz(99));
    }

    /**
     * @testdox Fizz buzz returns buzz for multiples of 5
     */
    public function testFizzBuzzReturnsBuzzForMultiplesOf5()
    {
        $this->assertEquals('Buzz', fizzBuzz(5));
        $this->assertEquals('Buzz', fizzBuzz(10));
        $this->assertEquals('Buzz', fizzBuzz(20));
        $this->assertEquals('Buzz', fizzBuzz(25));
    }

    /**
     * @testdox Fizz buzz returns fizz buzz for multiples of 3 and 5
     */
    public function testFizzBuzzReturnsFizzBuzzForMultiplesOf3And5()
    {
        $this->assertEquals('FizzBuzz', fizzBuzz(15));
        $this->assertEquals('FizzBuzz', fizzBuzz(30));
        $this->assertEquals('FizzBuzz', fizzBuzz(45));
        $this->assertEquals('FizzBuzz', fizzBuzz(60));
        $this->assertEquals('FizzBuzz', fizzBuzz(75));
        $this->assertEquals('FizzBuzz', fizzBuzz(90));
    }
}
