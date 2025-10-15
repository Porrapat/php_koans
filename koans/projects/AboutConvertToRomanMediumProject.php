<?php

namespace Koans;
use KoansLib\KoansTestCase;

function convert_to_roman_medium(int $number): string
{
    return ____;
}

/**
 * @testdox Write the function that converts numbers (1-100) to Roman numerals
 */
class AboutConvertToRomanMediumProject extends KoansTestCase
{
    /**
     * @testdox Convert numbers with tens to Roman numerals
     */
    public function testConvertTens(): void
    {
        $this->assertEquals('X', convert_to_roman_medium(10));
        $this->assertEquals('XX', convert_to_roman_medium(20));
        $this->assertEquals('XXX', convert_to_roman_medium(30));
        $this->assertEquals('XL', convert_to_roman_medium(40));
        $this->assertEquals('L', convert_to_roman_medium(50));
        $this->assertEquals('LX', convert_to_roman_medium(60));
        $this->assertEquals('LXX', convert_to_roman_medium(70));
        $this->assertEquals('LXXX', convert_to_roman_medium(80));
        $this->assertEquals('XC', convert_to_roman_medium(90));
        $this->assertEquals('C', convert_to_roman_medium(100));
    }

    /**
     * @testdox Convert mixed numbers to Roman numerals
     */
    public function testConvertMixedNumbers(): void
    {
        $this->assertEquals('XIV', convert_to_roman_medium(14));
        $this->assertEquals('XXVII', convert_to_roman_medium(27));
        $this->assertEquals('XLIV', convert_to_roman_medium(44));
        $this->assertEquals('LVIII', convert_to_roman_medium(58));
        $this->assertEquals('LXXIX', convert_to_roman_medium(79));
        $this->assertEquals('XCIX', convert_to_roman_medium(99));
    }

    /**
     * @testdox Convert edge case numbers
     */
    public function testConvertEdgeCases(): void
    {
        $this->assertEquals('I', convert_to_roman_medium(1));
        $this->assertEquals('IV', convert_to_roman_medium(4));
        $this->assertEquals('V', convert_to_roman_medium(5));
        $this->assertEquals('IX', convert_to_roman_medium(9));
        $this->assertEquals('XIII', convert_to_roman_medium(13));
        $this->assertEquals('XLIX', convert_to_roman_medium(49));
        $this->assertEquals('XCVIII', convert_to_roman_medium(98));
    }
}
