<?php
namespace PhpKoans;

use PHPUnit\Framework\TestCase;

defined('__') or define('__', null);

class AssertKoans extends TestCase
{
    /**
     * @testdox We shall contemplate truth by testing reality, via asserts.
     */
    public function testAssertTruth()
    {
        // Change "false" to "true"
        $this->assertTrue(true);
    }

    /**
     * @testdox Enlightenment may be more easily achieved with appropriate messages.
     */
    public function testAssertWithMessage()
    {
        // Change "false" to "true"
        $this->assertTrue(true, "This should be True, please fix this");
    }

    /**
     * @testdox Sometimes we will ask you to fill in the values.
     */
    public function testFillInValues()
    {
        // Replace __ with your answer
        $this->assertEquals(2, 1+1);
    }

    /**
     * @testdox To understand reality, we must compare our expectations against reality.
     */
    public function testAssertEquality()
    {
        $expected_value = 2; // Replace __ with your answer
        $actual_value = 1 + 1;

        $this->assertTrue($expected_value == $actual_value);
    }

    /**
     * @testdox Some ways of asserting equality are better than others.
     */
    public function testABetterWayToAssertEquality()
    {
        $expected_value = 2; // Replace __ with your answer
        $actual_value = 1 + 1;

        $this->assertEquals($expected_value, $actual_value);
    }

    /**
     * @testdox Sometimes we need to know the variable type.
     */
    public function testSometimesWeNeedToKnowTheVariableType()
    {
        $this->assertEquals("string", gettype("What am I"));
    }

    /**
     * @testdox Sometimes we need to know the class type.
     */
    public function testSometimesWeNeedToKnowTheClassType()
    {
        // See bottom of this file for class definition
        $object = new Enlightenment();

        $this->assertEquals('PhpKoans\Enlightenment', get_class($object));
    }
}

// phpcs:disable
/**
 * Empty class for testThatSometimesWeNeedToKnowTheClassType()
 */
class Enlightenment {
    /**
     * Important: This class is within the PhpKoans namespace.
     * That means that the FQCN ("fully qualified class name") starts with "PhpKoans\"
     */
};
// phpcs:enable
