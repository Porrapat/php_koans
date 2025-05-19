<?php

namespace Koans;

use PHPUnit\Framework\TestCase;

class AboutStrings extends TestCase
{
    /**
     * @testdox Double-quoted strings are strings.
     */
    public function testDoubleQuotedStringsAreStrings()
    {
        $string = "Hello, World";

        // is_string() returns a true or false
        $this->assertEquals(true, is_string($string));
    }

    /**
     * @testdox Single-quoted strings are also strings.
     */
    public function testSingleQuotedStringsAreAlsoStrings()
    {
        $string = 'Goodbye, World';
        $this->assertEquals(true, is_string($string));
    }

    /**
     * @testdox Use the backslash for escaping quotes in strings.
     */
    public function testUseBackslashForThoseHardCases()
    {
        $a = "He said, \"Don't\"";
        $b = 'He said, "Don\'t"';
        $this->assertEquals(true, $a === $b);
    }

    /**
     * @testdox Use single-quotes to create a string that contains double-quotes.
     */
    public function testUseSingleQuotesToCreateStringWithDoubleQuotes()
    {
        $string = 'He said, "Go Away."';
        $this->assertEquals('He said, "Go Away."', $string); // Replace __ with a single quoted escaped version of the string
    }

    /**
     * @testdox Use double-quotes to create a string that contains single-quotes.
     */
    public function testUseDoubleQuotesToCreateStringsWithSingleQuotes()
    {
        $string = "Don't";
        $this->assertEquals("Don't", $string); // Replace __ with a double quoted escaped version of the string
    }

    /**
     * @testdox Strings can continue onto multiple lines.
     */
    public function testStringsCanContinueOntoMultipleLines()
    {
        $string = "It was the best of times,
It was the worst of times.";

        // strlen() returns the length of a string as an integer (Hint: line breaks count as a character)
        $this->assertEquals(53, strlen($string));
    }

    /**
     * @testdox Strings can be wrapped in a heredoc syntax.
     */
    public function testStringsCanBeWrappedInAHeredocSyntax()
    {
        $string = <<<EOT
Howdy,
world!
EOT;
        // Hint: First and last line breaks of a Heredoc don't count
        $this->assertEquals(14, strlen($string));
    }

    /**
     * @testdox A heredoc identifier can be arbitrary.
     *
     * Reference: https://secure.php.net/manual/en/language.types.string.php#language.types.string.syntax.heredoc
     */
    public function testHeredocIdentifierIsArbitrary()
    {
        $string = <<<WHATEVERYOUWANT
Howdy,
world!
WHATEVERYOUWANT;

        $this->assertEquals(14, strlen($string));
    }

    /**
     * @testdox Strings can be wrapped in a nowdoc syntax.
     */
    public function testStringsCanBeWrappedInANowdocSyntax()
    {
        // Note the single quotes around EOT, this is the Nowdoc syntax
        $string = <<<'EOT'
Howdy,
world!
EOT;
        // Hint: First and last line breaks of a Heredoc don't count
        $this->assertEquals(14, strlen($string));
    }

    /**
     * @testdox Heredoc can parse string in hardly cases.
     */
    public function testUseHeredocToHandleReallyHardCases()
    {
        $a = <<<STR
flexible quotes can handle both ' and " characters
STR;
        $b = "flexible quotes can handle both ' and \" characters";
        $c = 'flexible quotes can handle both \' and " characters';
        $this->assertEquals(true, $a === $b);
        $this->assertEquals(true, $a === $c);
    }

    /**
     * @testdox Heredoc can handle multiple lines.
     */
    public function testHeredocCanHandleMultipleLines()
    {
        $longString = <<<TEXT
It was the best of times,
It was the worst of times.

TEXT;
        $this->assertEquals(55, strlen($longString));
        $this->assertEquals(2, substr_count($longString, "\n"));
        $this->assertEquals('I', substr($longString, 0, 1));
    }
}