<?php

namespace Koans;

use PHPUnit\Framework\TestCase;

// // Placeholder constant used for learners to fill in
// if (!defined('__')) {
//     define('__', null);
// }

// define('__', new \KoansLib\KoanIncomplete());
define('__', 'FILL_ME_IN');
// define('__', '__INCOMPLETE__');

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
        $this->assertEquals(2, 1 + 1);
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

        $this->assertEquals(__, get_class($object));
    }
}

/**
 * Empty class for testThatSometimesWeNeedToKnowTheClassType()
 */
class Enlightenment {
    /**
     * Important: This class is within the Koans namespace.
     * That means that the FQCN ("fully qualified class name") starts with "Koans\"
     */
};