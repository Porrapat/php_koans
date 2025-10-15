<?php

namespace Koans;

use KoansLib\KoansTestCase;

function is_palindrome_phrase(string $phrase): bool
{
    // Remove all non-alphanumeric characters and convert to lowercase
    $cleanedPhrase = preg_replace('/[^a-z0-9]/i', '', $phrase);
    $cleanedPhrase = strtolower($cleanedPhrase);
    
    // Compare the phrase with its reverse
    return $cleanedPhrase === strrev($cleanedPhrase);
}

/**
 * @testdox Write the function that checks if a phrase is a palindrome (ignoring spaces, punctuation, and case)
 */
class AboutPalindromeHardProject extends KoansTestCase
{
    /**
     * @testdox Check simple word palindromes
     */
    public function testSimpleWordPalindromes(): void
    {
        $this->assertTrue(is_palindrome_phrase('racecar'));
        $this->assertTrue(is_palindrome_phrase('level'));
        $this->assertTrue(is_palindrome_phrase('madam'));
    }

    /**
     * @testdox Check palindrome phrases with spaces
     */
    public function testPalindromePhrasesWithSpaces(): void
    {
        $this->assertTrue(is_palindrome_phrase('race car'));
        $this->assertTrue(is_palindrome_phrase('taco cat'));
        $this->assertTrue(is_palindrome_phrase('never odd or even'));
        $this->assertTrue(is_palindrome_phrase('was it a car or a cat i saw'));
        $this->assertTrue(is_palindrome_phrase('nurses run'));
    }

    /**
     * @testdox Check palindrome phrases with punctuation
     */
    public function testPalindromePhrasesWithPunctuation(): void
    {
        $this->assertTrue(is_palindrome_phrase('A man, a plan, a canal: Panama'));
        $this->assertTrue(is_palindrome_phrase('Madam, I\'m Adam'));
        $this->assertTrue(is_palindrome_phrase('Never odd or even.'));
        $this->assertTrue(is_palindrome_phrase('Do geese see God?'));
        $this->assertTrue(is_palindrome_phrase('Was it a car or a cat I saw?'));
    }

    /**
     * @testdox Check complex palindrome sentences
     */
    public function testComplexPalindromeSentences(): void
    {
        $this->assertTrue(is_palindrome_phrase('A Santa at NASA'));
        $this->assertTrue(is_palindrome_phrase('Mr. Owl ate my metal worm'));
        $this->assertTrue(is_palindrome_phrase('No lemon, no melon'));
        $this->assertTrue(is_palindrome_phrase('Eva, can I see bees in a cave?'));
    }

    /**
     * @testdox Check palindromes with numbers
     */
    public function testPalindromesWithNumbers(): void
    {
        $this->assertTrue(is_palindrome_phrase('11211'));
        $this->assertTrue(is_palindrome_phrase('1221'));
        $this->assertTrue(is_palindrome_phrase('Race car 123 321 race car'));
    }

    /**
     * @testdox Check non-palindrome phrases
     */
    public function testNonPalindromePhrases(): void
    {
        $this->assertFalse(is_palindrome_phrase('hello world'));
        $this->assertFalse(is_palindrome_phrase('This is not a palindrome'));
        $this->assertFalse(is_palindrome_phrase('PHP is awesome'));
        $this->assertFalse(is_palindrome_phrase('Almost a palindrome, but not'));
    }

    /**
     * @testdox Check edge cases
     */
    public function testEdgeCases(): void
    {
        $this->assertTrue(is_palindrome_phrase(''));
        $this->assertTrue(is_palindrome_phrase('a'));
        $this->assertTrue(is_palindrome_phrase('!!!'));
        $this->assertTrue(is_palindrome_phrase('   '));
        $this->assertTrue(is_palindrome_phrase('.,!?'));
    }
}
