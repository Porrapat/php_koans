<?php

namespace Koans;

use PHPUnit\Framework\TestCase;
use Koans\koansResources\Classes\Enlightenment;

class AboutAsserts extends TestCase
{
    /**
     * @testdox We shall contemplate truth by testing reality, via asserts.
     */
    public function testAssertTruth()
    {
        // Change "false" to "true"
        $this->assertTrue(true);  // This should be true
    }

    /**
     * @testdox Enlightenment may be more easily achieved with appropriate messages.
     */
    public function testAssertWithMessage()
    {
        $this->assertTrue(true, "This should be true -- Please fix this");
    }

    /**
     * @testdox To understand reality, we must compare our expectations against reality.
     */
    public function testAssertEquality()
    {
        $expectedValue = 2;
        $actualValue = 1 + 1;

        $this->assertTrue(2 == $actualValue);
    }

    /**
     * @testdox Some ways of asserting equality are better than others.
     */
    public function testABetterWayOfAssertingEquality()
    {
        $expectedValue = 2;
        $actualValue = 1 + 1;

        $this->assertEquals(2, $actualValue);
    }

    /**
     * @testdox Sometimes we will ask you to fill in the values
     */
    public function testFillInValues()
    {
        $this->assertEquals(2, 1 + 1);
    }

    /**
     * @testdox Sometimes we need to know the variable type.
     */
    public function testSometimesWeNeedToKnowTheVariableType()
    {
        // Must be string like 'string'
        $this->assertEquals('string', gettype("What am I"));
    }

    /**
     * @testdox Sometimes we need to know the class type.
     */
    public function testSometimesWeNeedToKnowTheClassType()
    {
        // See bottom of this file for class definition
        $object = new Enlightenment();

        $this->assertEquals('Enlightenment', basename(str_replace('\\', '/', get_class($object))));
        $this->assertEquals('Koans\koansResources\Classes\Enlightenment', get_class($object));
    }

    /**
     * @testdox Assert bonus, assertEquals allow type juggling
     */
    public function test_assert_equals_allows_type_juggling()
    {
        $this->assertEquals('42', '42');        // try 24 and '42'
        $this->assertEquals('1', 1);            // try 1 and '1'
        $this->assertEquals(0, false);          // try false or 0 and then try 'false'
    }

    /**
     * @testdox Assert bonus, assertSame requires exact type match
     */
    public function test_assert_same_requires_exact_type_match()
    {
        $this->assertSame(42, 42);      // try 42, then '42' and see difference
        $this->assertSame(true, true);    // try true, then 'true' and see difference

        // The following examples would fail if uncommented due to type mismatch:
        // $this->assertSame(42, '42');
        // $this->assertSame(true, 1);
    }

    /**
     * @testdox Assert bonus, assertSame vs assertEquals with array
     */
    public function test_assert_same_vs_equals_with_arrays()
    {
        $expected = ['a' => 1];
        $actual   = ['a' => '1'];

        $this->assertEquals($expected, $actual);        // passes
        $this->assertSame(['a' => '1'], $actual);       // fails until fixed
    }
}
