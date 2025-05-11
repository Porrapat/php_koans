<?php

namespace Koans;

use PHPUnit\Framework\TestCase;

// Placeholder constant used for learners to fill in
if (!defined('__')) {
    define('__', null);
}

class AboutAssertsTest extends TestCase
{
    // We shall contemplate truth by testing reality, via asserts.
    public function test_assert_truth()
    {
        $this->assertTrue(true);  // This should be true
    }

    // Enlightenment may be more easily achieved with appropriate messages.
    public function test_assert_with_message()
    {
        $this->assertTrue(true, "This should be true -- Please fix this");
    }

    // To understand reality, we must compare our expectations against reality.
    public function test_assert_equality()
    {
        $expectedValue = 2;
        $actualValue = 1 + 1;

        $this->assertTrue($expectedValue == $actualValue);
    }

    // Some ways of asserting equality are better than others.
    public function test_a_better_way_of_asserting_equality()
    {
        $expectedValue = 2;
        $actualValue = 1 + 1;

        $this->assertEquals($expectedValue, $actualValue);
    }

    // Sometimes we will ask you to fill in the values
    public function test_fill_in_values()
    {
        $this->assertEquals(2, 1 + 1);
    }
}