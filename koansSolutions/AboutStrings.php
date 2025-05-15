<?php

namespace Koans;

use PHPUnit\Framework\TestCase;

class AboutStrings extends TestCase
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
        $c = 'flexible quotes can handle both \' and " characters';
        $this->assertEquals(true, $a === $b);
        $this->assertEquals(true, $a === $c);
    }

    public function testFlexibleQuotesCanHandleMultipleLines()
    {
        $longString = <<<TEXT
It was the best of times,
It was the worst of times.

TEXT;
        $this->assertEquals(55, strlen($longString));
        $this->assertEquals(2, substr_count($longString, "\n"));
        $this->assertEquals('I', substr($longString, 0, 1));
    }

    public function testHereDocumentsCanAlsoHandleMultipleLines()
    {
        $longString = <<<EOS
It was the best of times,
It was the worst of times.
EOS;
        $this->assertEquals(53, strlen($longString));
        $this->assertEquals(1, substr_count($longString, "\n"));
        $this->assertEquals('I', substr($longString, 0, 1));
    }

    public function testDotWillConcatenateTwoStrings()
    {
        $string = "Hello, " . "World";
        $this->assertEquals('Hello, World', $string);
    }

    public function testDotConcatenationWillLeaveTheOriginalStringsUnmodified()
    {
        $hi = "Hello, ";
        $there = "World";
        $string = $hi . $there;
        $this->assertEquals('Hello, ', $hi);
        $this->assertEquals('World', $there);
    }

    public function testDotEqualsWillConcatenateToTheEndOfAString()
    {
        $hi = "Hello, ";
        $there = "World";
        $hi .= $there;
        $this->assertEquals('Hello, World', $hi);
    }

    public function testDotEqualsLeavesOriginalReferenceUnmodified()
    {
        $original = "Hello, ";
        $hi = $original;
        $hi .= "World";
        $this->assertEquals('Hello, ', $original);
    }

    public function testDoubleQuotedStringInterpretEscapeCharacters()
    {
        $string = "\n";
        $this->assertEquals(1, strlen($string));
    }

    public function testSingleQuotedStringDoInterpretEscapeCharacters()
    {
        $string = '\n';
        $this->assertEquals(2, strlen($string));
    }

    public function testSingleQuotesSometimesInterpretEscapeCharacters()
    {
        $string = '\\\'';
        $this->assertEquals(2, strlen($string));
        $this->assertEquals('\\\'', $string);
    }

    public function testDoubleQuotedStringsInterpolateVariables()
    {
        $value = 123;
        $string = "The value is $value";
        $this->assertEquals('The value is 123', $string);
    }

    public function testSingleQuotedStringsDoNotInterpolate()
    {
        $value = 123;
        $string = 'The value is $value';
        $this->assertEquals('The value is $value', $string);
    }

    public function testAnyExpressionMayBeInterpolated()
    {
        $string = "The square root of 5 is " . sqrt(5);
        $this->assertEquals('The square root of 5 is 2.2360679774998', $string);
    }

    public function testYouCanGetASubstringFromAString()
    {
        $string = "Bacon, lettuce and tomato";
        $this->assertEquals('let', substr($string, 7, 3));
    }

    public function testYouCanGetASingleCharacterFromAString()
    {
        $string = "Bacon, lettuce and tomato";
        $this->assertEquals('a', $string[1]);
    }

    public function testStringsCanBeSplit()
    {
        $string = "Sausage Egg Cheese";
        $words = explode(" ", $string);
        $this->assertEquals(['Sausage', 'Egg', 'Cheese'], $words);
    }

    public function testStringsCanBeSplitWithDifferentPatterns()
    {
        $string = "the:rain:in:thailand";
        $words = preg_split('/:/', $string);
        $this->assertEquals(['the', 'rain', 'in', 'thailand'], $words);
    }

    public function testStringsCanBeJoined()
    {
        $words = ["Now", "is", "the", "time"];
        $this->assertEquals('Now is the time', implode(" ", $words));
    }

    public function testStringsAreUniqueObjects()
    {
        $a = "a string";
        $b = "a string";

        $this->assertEquals(true, $a == $b);
        $this->assertEquals(true, spl_object_id((object) $a) == spl_object_id((object) $b));
    }
}