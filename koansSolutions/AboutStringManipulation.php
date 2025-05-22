<?php

namespace Koans;

use PHPUnit\Framework\TestCase;

class AboutStringManipulation extends TestCase
{
    /**
     * @testdox A dot concatenates strings.
     */
    public function testDotWillConcatenateTwoStrings()
    {
        $string = "Hello, " . "World";
        $this->assertEquals('Hello, World', $string);
    }

    /**
     * @testdox Dot-concatenation works with variables.
     */
    public function testDotWorksWithVariables()
    {
        $hi = "Hello, ";
        $there = "World";
        $string = $hi . $there;

        $this->assertEquals('Hello, World', $string);
    }

    /**
     * @testdox Dot-concatenation will not modify the original strings.
     */
    public function testDotWillNotModifyOriginalStrings()
    {
        $hi = "Hello, ";
        $there = "World";
        $string = $hi . $there;
        $this->assertEquals('Hello, ', $hi);
        $this->assertEquals('World', $there);
    }

    /**
     * @testdox Dot-equals will append to the end of a string.
     */
    public function testDotEqualsAppendsToEndOfString()
    {
        $hi = "Hello, ";
        $there = "World";
        $hi .= $there;
        $this->assertEquals('Hello, World', $hi);
    }

    /**
     * @testdox Dot-equals leave original string unmodified.
     */
    public function testDotEqualsLeavesOriginalStringUnmodified()
    {
        $original = "Hello, ";
        $hi = $original;
        $hi .= "World";
        $this->assertEquals('Hello, ', $original);
    }

    /**
     * @testdox Double-quoted string interpet escape characters.
     */
    public function testDoubleQuotedStringInterpretEscapeCharacters()
    {
        $string = "\n";
        $this->assertEquals(1, strlen($string));
    }

    /**
     * @testdox Single-quoted string interpet escape characters.
     */
    public function testSingleQuotedStringDoInterpretEscapeCharacters()
    {
        $string = '\n';
        $this->assertEquals(2, strlen($string));
    }

    /**
     * @testdox Single-quoted string sometimes interpet escape characters.
     */
    public function testSingleQuotesSometimesInterpretEscapeCharacters()
    {
        $string = '\\\'';
        $this->assertEquals(2, strlen($string));
        $this->assertEquals('\\\'', $string);
    }

    /**
     * @testdox Double-quoted string interpet variables.
     */
    public function testDoubleQuotedStringsInterpolateVariables()
    {
        $value = 123;
        $string = "The value is $value";
        $this->assertEquals('The value is 123', $string);
    }

    /**
     * @testdox Single-quoted string do not interpolate.
     */
    public function testSingleQuotedStringsDoNotInterpolate()
    {
        $value = 123;
        $string = 'The value is $value';
        $this->assertEquals('The value is $value', $string);
    }

    /**
     * @testdox Another option for variable iterpolation in a double-quoted string is with curly brackets.
     */
    public function testStringInterpolationWithCurlyBrackets()
    {
        $value = "one";
        $string = "The value is {$value}";

        $this->assertEquals('The value is one', $string);
    }

    /**
     * @testdox If one wants to interpolate associative array elements, one must use curly brackets.
     */
    public function testInterpolatingAssociativeArrayElementsMustBeInCurlyBrackets()
    {
        $values = ["test" => "one", "foo" => "two"];
        $string = "The value is {$values["test"]}";

        $this->assertEquals('The value is one', $string);
    }

    /**
     * @testdox Heredoc interpolates like a double-quoted string.
     */
    public function testHeredocInterpolatesLikeADoubleQuotedString()
    {
        $value = "one";
        $string = <<<EOT
The value is $value
EOT;
        // Hint: First and last line breaks of a Heredoc don't count
        $this->assertEquals('The value is one', $string);
    }

    /**
     * @testdox Nowdoc interpolates like a single-quoted string.
     */
    public function testNowdocInterpolatesLikeASingleQuotedString()
    {
        $value = "one";
        $string = <<<'EOT'
The value is $value
EOT;
        // Hint: First and last line breaks of a Heredoc don't count
        $this->assertEquals('The value is $value', $string);
    }

    /**
     * @testdox Interpolate any expression.
     */
    public function testAnyExpressionMayBeInterpolated()
    {
        $string = "The square root of 5 is " . round(sqrt(5), 3);
        $this->assertEquals('The square root of 5 is 2.236', $string);
    }

    /**
     * @testdox One can format a string using sprintf.
     */
    public function testStringFormattingWithSprintf()
    {
        $product = "banana";

        $string = sprintf('He bought a %s.', $product);

        $this->assertEquals('He bought a banana.', $string);
    }

    /**
     * @testdox When formatting a string with sprintf, use different type specifiers for the different types of variables.
     */
    public function testStringFormattingWithSprintfTypeSpecifiers()
    {
        $product = "bananas";
        $quantity = 3;
        $pricePer = 2.5;

        // Be careful of the default floating point precision (6 decimal places)
        $string = sprintf('He bought %d %s for $%f.', $quantity, $product, $pricePer);

        $this->assertEquals('He bought 3 bananas for $2.500000.', $string);
    }

    /**
     * @testdox Complex string formatting can be done with sprintf.
     */
    public function testComplexStringFormattingWithSprintf()
    {
        $product = "bananas";
        $quantity = 3;
        $pricePer = 2.5;

        // For more information see: https://secure.php.net/manual/en/function.sprintf.php
        $string = sprintf(
            'He bought %d %s for $%.2f each, but those %1$d %2$s were not worth the price.',
            $quantity,
            $product,
            $pricePer
        );

        $this->assertEquals('He bought 3 bananas for $2.50 each, but those 3 bananas were not worth the price.', $string);
    }

    /**
     * @testdox Using function substr.
     */
    public function testYouCanGetASubstringFromAString()
    {
        $string = "Bacon, lettuce and tomato";
        $this->assertEquals('let', substr($string, 7, 3));
    }

    /**
     * @testdox One can get a single character from a string using an array index.
     */
    public function testYouCanGetASingleCharacterFromAString()
    {
        $string = "Bacon, lettuce and tomato";
        $this->assertEquals('a', $string[1]);
    }

    /**
     * @testdox Strings can be split into an array.
     */
    public function testStringsCanBeSplit()
    {
        $string = "Sausage Egg Cheese";
        $words = explode(" ", $string);
        $this->assertEquals(['Sausage', 'Egg', 'Cheese'], $words);
    }

    /**
     * @testdox Strings can be split using different patterns
     */
    public function testStringsCanBeSplitWithDifferentPatterns()
    {
        $string = "the:rain:in:thailand";
        $words = preg_split('/:/', $string);
        $this->assertEquals(['the', 'rain', 'in', 'thailand'], $words);
    }

    /**
     * @testdox Arrays of strings can be joined into a single string
     */
    public function testStringsCanBeJoined()
    {
        $words = ["Now", "is", "the", "time"];
        $this->assertEquals('Now is the time', implode(" ", $words));
    }

    /**
     * @testdox One can change the case of strings.
     */
    public function testChangeCaseOfStrings()
    {
        $this->assertEquals('One Hand Clap', ucwords('one hand clap'));
        $this->assertEquals('ONE HAND CLAP', strtoupper('one hand clap'));
        $this->assertEquals('sausage egg cheese', strtolower('Sausage EGG Cheese'));
    }
}