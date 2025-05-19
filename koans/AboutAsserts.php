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
        $this->assertTrue(false);  // This should be true
    }

    /**
     * @testdox Enlightenment may be more easily achieved with appropriate messages.
     */
    public function testAssertWithMessage()
    {
        $this->assertTrue(__, "This should be true -- Please fix this");
    }

    /**
     * @testdox To understand reality, we must compare our expectations against reality.
     */
    public function testAssertEquality()
    {
        $expectedValue = 2;
        $actualValue = 1 + 1;

        $this->assertTrue(__ == $actualValue);
    }

    /**
     * @testdox Some ways of asserting equality are better than others.
     */
    public function testABetterWayOfAssertingEquality()
    {
        $expectedValue = 2;
        $actualValue = 1 + 1;

        $this->assertEquals(__, $actualValue);
    }

    /**
     * @testdox Sometimes we will ask you to fill in the values
     */
    public function testFillInValues()
    {
        $this->assertEquals(__, 1 + 1);
    }

    /**
     * @testdox Sometimes we need to know the variable type.
     */
    public function testSometimesWeNeedToKnowTheVariableType()
    {
        // Must be string like 'string'
        $this->assertEquals(__, gettype("What am I"));
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
        $this->assertEquals(__, '42');        // try 24 and '42'
        $this->assertEquals(__, 1);            // try 1 and '1'
        $this->assertEquals(__, false);          // try false or 0 and then try 'false'
    }

    /**
     * @testdox Assert bonus, assertSame requires exact type match
     */
    public function test_assert_same_requires_exact_type_match()
    {
        $this->assertSame(__, 42);      // try 42, then '42' and see difference
        $this->assertSame(__, true);    // try true, then 'true' and see difference

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

        $this->assertEquals(__, $actual);           // passes
        $this->assertSame(['a' => __], $actual);    // fails until fixed
    }
}
