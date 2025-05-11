<?php

namespace Koans;

use PHPUnit\Framework\TestCase;

if (!defined('__')) {
    define('__', null); // Placeholder for Koans
}

class AboutStringsTest extends TestCase
{
    public function testDoubleQuotedStringsAreStrings()
    {
        $string = "Hello, World";
        $this->assertEquals(true, is_string($string));
    }

    public function testSingleQuotedStringsAreAlsoStrings()
    {
        $string = 'Goodbye, World';
        $this->assertEquals(true, is_string($string));
    }

    public function testUseSingleQuotesToCreateStringWithDoubleQuotes()
    {
        $string = 'He said, "Go Away."';
        $this->assertEquals('He said, "Go Away."', $string);
    }

    public function testUseDoubleQuotesToCreateStringsWithSingleQuotes()
    {
        $string = "Don't";
        $this->assertEquals("Don't", $string);
    }

    public function testUseBackslashForThoseHardCases()
    {
        $a = "He said, \"Don't\"";
        $b = 'He said, "Don\'t"';
        $this->assertEquals(true, $a === $b);
    }

    public function testUseFlexibleQuotingToHandleReallyHardCases()
    {
        $a = <<<STR
flexible quotes can handle both ' and " characters
STR;
        $b = "flexible quotes can handle both ' and \" characters";
        $c = 'flexible quotes c
        an handle both \' and " characters';
        $this->assertEquals(true, $a === $b);
        $this->assertEquals(false, $a === $c);
    }

    public function testFlexibleQuotesCanHandleMultipleLines()
    {
        $longString = <<<TEXT
It was the best of times,
It was the worst of times.

TEXT;
        $this->assertEquals(55, strlen($longString));
        $this->assertEquals(2, substr_count($longString, "\n"));
        $this->assertEquals("I", substr($longString, 0, 1));
    }

//     public function testHereDocumentsCanAlsoHandleMultipleLines()
//     {
//         $longString = <<<EOS
// It was the best of times,
// It was the worst of times.
// EOS;
//         $this->assertEquals(__, strlen($longString));
//         $this->assertEquals(__, substr_count($longString, "\n"));
//         $this->assertEquals(__, substr($longString, 0, 1));
//     }

//     public function testPlusWillConcatenateTwoStrings()
//     {
//         $string = "Hello, " . "World";
//         $this->assertEquals(__, $string);
//     }

//     public function testPlusConcatenationWillLeaveTheOriginalStringsUnmodified()
//     {
//         $hi = "Hello, ";
//         $there = "World";
//         $string = $hi . $there;
//         $this->assertEquals(__, $hi);
//         $this->assertEquals(__, $there);
//     }

//     public function testDotEqualsWillConcatenateToTheEndOfAString()
//     {
//         $hi = "Hello, ";
//         $there = "World";
//         $hi .= $there;
//         $this->assertEquals(__, $hi);
//     }

//     public function testDotEqualsLeavesOriginalReferenceUnmodified()
//     {
//         $original = "Hello, ";
//         $hi = $original;
//         $hi .= "World";
//         $this->assertEquals(__, $original);
//     }

//     public function testDoubleQuotedStringInterpretEscapeCharacters()
//     {
//         $string = "\n";
//         $this->assertEquals(__, strlen($string));
//     }

//     public function testSingleQuotedStringDoNotInterpretEscapeCharacters()
//     {
//         $string = '\n';
//         $this->assertEquals(__, strlen($string));
//     }

//     public function testSingleQuotesSometimesInterpretEscapeCharacters()
//     {
//         $string = '\\\'';
//         $this->assertEquals(__, strlen($string));
//         $this->assertEquals(__, $string);
//     }

//     public function testDoubleQuotedStringsInterpolateVariables()
//     {
//         $value = 123;
//         $string = "The value is $value";
//         $this->assertEquals(__, $string);
//     }

//     public function testSingleQuotedStringsDoNotInterpolate()
//     {
//         $value = 123;
//         $string = 'The value is $value';
//         $this->assertEquals(__, $string);
//     }

//     public function testAnyExpressionMayBeInterpolated()
//     {
//         $string = "The square root of 5 is " . sqrt(5);
//         $this->assertEquals(__, $string);
//     }

//     public function testYouCanGetASubstringFromAString()
//     {
//         $string = "Bacon, lettuce and tomato";
//         $this->assertEquals(__, substr($string, 7, 3));
//         $this->assertEquals(__, substr($string, 7, 3)); // PHP has no native `7..9` style
//     }

//     public function testYouCanGetASingleCharacterFromAString()
//     {
//         $string = "Bacon, lettuce and tomato";
//         $this->assertEquals(__, $string[1]);
//     }

//     public function testStringsCanBeSplit()
//     {
//         $string = "Sausage Egg Cheese";
//         $words = explode(" ", $string);
//         $this->assertEquals([__, __, __], $words);
//     }

//     public function testStringsCanBeSplitWithDifferentPatterns()
//     {
//         $string = "the:rain:in:spain";
//         $words = preg_split('/:/', $string);
//         $this->assertEquals([__, __, __, __], $words);
//     }

//     public function testStringsCanBeJoined()
//     {
//         $words = ["Now", "is", "the", "time"];
//         $this->assertEquals(__, implode(" ", $words));
//     }

//     public function testStringsAreUniqueObjects()
//     {
//         $a = "a string";
//         $b = "a string";

//         $this->assertEquals(__, $a == $b);
//         $this->assertEquals(__, spl_object_id((object) $a) == spl_object_id((object) $b));
//     }

    // public function test_string_assignment()
    // {
    //     $str = 'Hello';
    //     $this->assertEquals(__, $str);
    // }

    // public function test_string_concatenation()
    // {
    //     $str = 'Hello ' . 'World';
    //     $this->assertEquals(__, $str);
    // }

    // public function test_string_interpolation()
    // {
    //     $name = 'Porrapat';
    //     $this->assertEquals(__, "Hello $name");
    // }
}