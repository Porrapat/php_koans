<?php

namespace Koans;

use PHPUnit\Framework\TestCase;

class AboutArrays extends TestCase
{
    public function testCreatingArrays()
    {
        $emptyArray = [];
        $this->assertEquals('array', gettype($emptyArray)); // Hint: 'array'
        $this->assertEquals(0, count($emptyArray));   // Hint: 0
    }

    public function testArrayLiterals()
    {
        $array = [];
        $this->assertEquals([], $array);

        $array[0] = 1;
        $this->assertEquals([1], $array);

        $array[1] = 2;
        $this->assertEquals([1, 2], $array); // Hint: 2

        $array[] = 333;
        $this->assertEquals([1, 2, 333], $array); // Hint: [1, 2, 333]
    }

    public function testAccessingArrayElements()
    {
        $array = ['peanut', 'butter', 'and', 'jelly'];

        $this->assertEquals('peanut', $array[0]);           // Hint: 'peanut'
        $this->assertEquals('peanut', reset($array));       // Hint: 'peanut'
        $this->assertEquals('jelly', $array[3]);           // Hint: 'jelly'
        $this->assertEquals('jelly', end($array));         // Hint: 'jelly'
        $this->assertEquals('jelly', $array[count($array) - 1]); // Hint: 'jelly'
        $this->assertEquals('butter', $array[1]);           // Hint: 'butter'
    }

    public function testSlicingArrays()
    {
        $array = ['peanut', 'butter', 'and', 'jelly'];

        $this->assertEquals(['peanut'], array_slice($array, 0, 1));   // Hint: ['peanut']
        $this->assertEquals(['peanut', 'butter'], array_slice($array, 0, 2));   // Hint: ['peanut', 'butter']
        $this->assertEquals(['and', 'jelly'], array_slice($array, 2, 2));   // Hint: ['and', 'jelly']
        $this->assertEquals(['and', 'jelly'], array_slice($array, 2, 20));  // Hint: ['and', 'jelly']
        $this->assertEquals([], array_slice($array, 4, 0));   // Hint: []
        $this->assertEquals([], array_slice($array, 4, 100)); // Hint: []
        $this->assertEquals([], array_slice($array, 5, 0));   // Hint: []
    }

    public function testArraysAndRanges()
    {
        $range = range(1, 5);
        $this->assertEquals('array', gettype($range));  // Hint: 'array'
        $this->assertNotEquals([1,2,3,4,5], '1..5'); // Simulation, not strict in PHP
        $this->assertEquals([1, 2, 3, 4, 5], range(1, 5));      // Hint: [1, 2, 3, 4, 5]
        $this->assertEquals([1, 2, 3, 4], range(1, 4));      // Hint: [1, 2, 3, 4]
    }

    public function testSlicingWithRanges()
    {
        $array = ['peanut', 'butter', 'and', 'jelly'];

        $this->assertEquals(['peanut', 'butter', 'and'], array_slice($array, 0, 3));   // Hint: ['peanut', 'butter', 'and']
        $this->assertEquals(['peanut', 'butter'], array_slice($array, 0, 2));   // Hint: ['peanut', 'butter']
        $this->assertEquals(['and', 'jelly'], array_slice($array, 2));      // Hint: ['and', 'jelly']
    }

    public function testPushingAndPoppingArrays()
    {
        $array = [1, 2];
        array_push($array, 'last');

        $this->assertEquals([1, 2, 'last'], $array); // Hint: [1, 2, 'last']

        $poppedValue = array_pop($array);
        $this->assertEquals('last', $poppedValue); // Hint: 'last'
        $this->assertEquals([1, 2], $array);       // Hint: [1, 2]
    }

    public function testShiftingArrays()
    {
        $array = [1, 2];
        array_unshift($array, 'first');

        $this->assertEquals(['first', 1, 2], $array); // Hint: ['first', 1, 2]

        $shiftedValue = array_shift($array);
        $this->assertEquals('first', $shiftedValue); // Hint: 'first'
        $this->assertEquals([1, 2], $array);        // Hint: [1, 2]
    }
}
