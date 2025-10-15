<?php

namespace Koans;
use KoansLib\KoansTestCase;

function convert_to_roman(int $number): string
{
    return ____;
}

/**
 * @testdox Write the function that converts numbers (1-10) to Roman numerals
 */
class AboutConvertToRomanEasyProject extends KoansTestCase
{
    /**
     * @testdox Convert single digit numbers to Roman numerals
     */
    public function testConvertSingleDigitNumbers(): void
    {
        $this->assertEquals('I', convert_to_roman(1));
        $this->assertEquals('II', convert_to_roman(2));
        $this->assertEquals('III', convert_to_roman(3));
        $this->assertEquals('IV', convert_to_roman(4));
        $this->assertEquals('V', convert_to_roman(5));
        $this->assertEquals('VI', convert_to_roman(6));
        $this->assertEquals('VII', convert_to_roman(7));
        $this->assertEquals('VIII', convert_to_roman(8));
        $this->assertEquals('IX', convert_to_roman(9));
        $this->assertEquals('X', convert_to_roman(10));
    }
}
