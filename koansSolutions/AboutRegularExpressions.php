<?php

namespace Koans;

use KoansLib\KoansTestCase;

// Resources for learning about Regular Expressions => https://www.w3schools.com/php/php_regex.asp
class AboutRegularExpressions extends KoansTestCase
{
    /**
     * @testdox preg_match tells you if a string contains matches of a pattern.
     */
    public function testUsesPregMatchToFindPatternsInAString()
    {
        $str = "PHP Koans have more Koans";
        $pattern = "/Koans/i";

        $this->assertEquals(1, preg_match($pattern, $str));
    }

    /**
     * @testdox preg_match_all tells you how many matches were found for a pattern in a string
     */
    public function testUsesPregMatchAllToKnowHowManyPatternsThereAreInAString()
    {
        $str = "Rain in SPAIN falls mainly on the plains.";
        $pattern = "/ain/i";

        $this->assertEquals(4, preg_match_all($pattern, $str));
    }

    /**
     * @testdox preg_replace replaces all of the matches of the pattern in a string with another string
     */
    public function testUsesPregReplaceToReplaceAllTheMatchesInAStringWithAnotherString()
    {
        $str = "This is the python Koans, python Rules!.";
        $pattern = "";

        //Use preg_replace
        $str_replaced = preg_replace('/python/i', 'PHP', $str);
        $this->assertEquals($str_replaced, "This is the PHP Koans, PHP Rules!.");
    }
}
