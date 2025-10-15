<?php

namespace Koans;

use KoansLib\KoansTestCase;

function convert_to_roman_hard(int $number): string
{
    $romanNumerals = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I'
    ];

    $result = '';
    foreach ($romanNumerals as $value => $numeral) {
        while ($number >= $value) {
            $result .= $numeral;
            $number -= $value;
        }
    }

    return $result;
}

/**
 * @testdox Write the function that converts numbers (1-3999) to Roman numerals
 */
class AboutConvertToRomanHardProject extends KoansTestCase
{
    /**
     * @testdox Convert numbers with hundreds to Roman numerals
     */
    public function testConvertHundreds(): void
    {
        $this->assertEquals('C', convert_to_roman_hard(100));
        $this->assertEquals('CC', convert_to_roman_hard(200));
        $this->assertEquals('CCC', convert_to_roman_hard(300));
        $this->assertEquals('CD', convert_to_roman_hard(400));
        $this->assertEquals('D', convert_to_roman_hard(500));
        $this->assertEquals('DC', convert_to_roman_hard(600));
        $this->assertEquals('DCC', convert_to_roman_hard(700));
        $this->assertEquals('DCCC', convert_to_roman_hard(800));
        $this->assertEquals('CM', convert_to_roman_hard(900));
    }

    /**
     * @testdox Convert numbers with thousands to Roman numerals
     */
    public function testConvertThousands(): void
    {
        $this->assertEquals('M', convert_to_roman_hard(1000));
        $this->assertEquals('MM', convert_to_roman_hard(2000));
        $this->assertEquals('MMM', convert_to_roman_hard(3000));
        $this->assertEquals('MMMCMXCIX', convert_to_roman_hard(3999));
    }

    /**
     * @testdox Convert complex mixed numbers to Roman numerals
     */
    public function testConvertComplexNumbers(): void
    {
        $this->assertEquals('CXXIII', convert_to_roman_hard(123));
        $this->assertEquals('CDXLIV', convert_to_roman_hard(444));
        $this->assertEquals('DXCVIII', convert_to_roman_hard(598));
        $this->assertEquals('CMXCIX', convert_to_roman_hard(999));
        $this->assertEquals('MCMXCIV', convert_to_roman_hard(1994));
        $this->assertEquals('MMXXIV', convert_to_roman_hard(2024));
        $this->assertEquals('MMMCCCXXXIII', convert_to_roman_hard(3333));
    }

    /**
     * @testdox Convert historical and significant years
     */
    public function testConvertHistoricalYears(): void
    {
        $this->assertEquals('MCMLIV', convert_to_roman_hard(1954));
        $this->assertEquals('MCMXC', convert_to_roman_hard(1990));
        $this->assertEquals('MM', convert_to_roman_hard(2000));
        $this->assertEquals('MMXIV', convert_to_roman_hard(2014));
        $this->assertEquals('MMDCCCLXXXVIII', convert_to_roman_hard(2888));
    }

    /**
     * @testdox Convert edge cases with subtractive notation
     */
    public function testConvertEdgeCasesWithSubtractiveNotation(): void
    {
        $this->assertEquals('IV', convert_to_roman_hard(4));
        $this->assertEquals('IX', convert_to_roman_hard(9));
        $this->assertEquals('XL', convert_to_roman_hard(40));
        $this->assertEquals('XC', convert_to_roman_hard(90));
        $this->assertEquals('CD', convert_to_roman_hard(400));
        $this->assertEquals('CM', convert_to_roman_hard(900));
        $this->assertEquals('CDXCIV', convert_to_roman_hard(494));
        $this->assertEquals('CMXCIV', convert_to_roman_hard(994));
    }
}
