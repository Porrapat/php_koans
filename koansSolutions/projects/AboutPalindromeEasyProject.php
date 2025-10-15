<?php

namespace Koans;

use KoansLib\KoansTestCase;

function is_palindrome(string $word): bool
{
    // Convert to lowercase for case-insensitive comparison
    $word = strtolower($word);
    
    // Compare the word with its reverse
    return $word === strrev($word);
}

/**
 * @testdox Write the function that checks if a word is a palindrome
 */
class AboutPalindromeEasyProject extends KoansTestCase
{
    /**
     * @testdox Check single character palindromes
     */
    public function testSingleCharacterPalindromes(): void
    {
        $this->assertTrue(is_palindrome('a'));
        $this->assertTrue(is_palindrome('A'));
        $this->assertTrue(is_palindrome('Z'));
    }

    /**
     * @testdox Check simple palindromes
     */
    public function testSimplePalindromes(): void
    {
        $this->assertTrue(is_palindrome('aa'));
        $this->assertTrue(is_palindrome('aba'));
        $this->assertTrue(is_palindrome('abba'));
        $this->assertTrue(is_palindrome('racecar'));
        $this->assertTrue(is_palindrome('level'));
        $this->assertTrue(is_palindrome('noon'));
        $this->assertTrue(is_palindrome('madam'));
    }

    /**
     * @testdox Check case-insensitive palindromes
     */
    public function testCaseInsensitivePalindromes(): void
    {
        $this->assertTrue(is_palindrome('Racecar'));
        $this->assertTrue(is_palindrome('Level'));
        $this->assertTrue(is_palindrome('Noon'));
        $this->assertTrue(is_palindrome('MadAm'));
    }

    /**
     * @testdox Check non-palindromes
     */
    public function testNonPalindromes(): void
    {
        $this->assertFalse(is_palindrome('hello'));
        $this->assertFalse(is_palindrome('world'));
        $this->assertFalse(is_palindrome('code'));
        $this->assertFalse(is_palindrome('test'));
    }

    /**
     * @testdox Check empty string
     */
    public function testEmptyString(): void
    {
        $this->assertTrue(is_palindrome(''));
    }
}
