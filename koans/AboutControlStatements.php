<?php

namespace Koans;

use PHPUnit\Framework\TestCase;

class AboutControlStatements extends TestCase
{
    /**
     * @testdox If-else executes the true branch when condition is true
     */
    public function testIfThenElseStatements()
    {
        if (true) {
            $result = 'true_value';
        } else {
            $result = 'false_value';
        }

        $this->assertEquals(__, $result);
    }

    /**
     * @testdox If statement executes when condition is true
     */
    public function testIfThenStatements()
    {
        $result = 'default_value';
        if (true) {
            $result = 'true_value';
        }

        $this->assertEquals(__, $result);
    }

    /**
     * @testdox Ternary operator returns value based on condition
     */
    public function testIfStatementsReturnValues()
    {
        $value = (true ? 'true_value' : 'false_value');
        $this->assertEquals(__, $value);

        $value = (false ? 'true_value' : 'false_value');
        $this->assertEquals(__, $value);
    }

    /**
     * @testdox If statement does nothing when condition is false and no else branch
     */
    public function testIfStatementWithNoElseFalseCondition()
    {
        $value = null;
        if (false) {
            $value = 'true_value';
        }

        $this->assertEquals(__, $value);
    }

    /**
     * @testdox Ternary condition evaluates both true and false branches correctly
     */
    public function testConditionOperators()
    {
        $this->assertEquals(__, (true ? 'true_value' : 'false_value'));
        $this->assertEquals(__, (false ? 'true_value' : 'false_value'));
    }

    /**
     * @testdox If statement modifier syntax works as expected
     */
    public function testIfStatementModifier()
    {
        $result = 'default_value';
        if (true) $result = 'true_value';

        $this->assertEquals(__, $result);
    }

    /**
     * @testdox Unless simulated with if-not works as expected
     */
    public function testUnlessStatement()
    {
        $result = 'default_value';
        if (!false) {
            $result = 'false_value';
        }

        $this->assertEquals(__, $result);
    }

    /**
     * @testdox Unless simulated with if-not skips when condition is true
     */
    public function testUnlessStatementEvaluateTrue()
    {
        $result = 'default_value';
        if (!true) {
            $result = 'true_value';
        }

        $this->assertEquals(__, $result);
    }

    /**
     * @testdox Unless statement modifier syntax also works
     */
    public function testUnlessStatementModifier()
    {
        $result = 'default_value';
        if (!false) $result = 'false_value';

        $this->assertEquals(__, $result);
    }

    /**
     * @testdox While loop multiplies numbers up to 10
     */
    public function testWhileStatement()
    {
        $i = 1;
        $result = 1;
        while ($i <= 10) {
            $result *= $i;
            $i++;
        }

        $this->assertEquals(__, $result);
    }

    /**
     * @testdox Break statement exits loop when condition is false
     */
    public function testBreakStatement()
    {
        $i = 1;
        $result = 1;
        while (true) {
            if (!($i <= 10)) {
                break;
            }
            $result *= $i;
            $i++;
        }

        $this->assertEquals(__, $result);
    }

    /**
     * @testdox Break can return value and exit early
     */
    public function testBreakStatementReturnsValue()
    {
        $i = 1;
        $result = null;
        while ($i <= 10) {
            if ($i % 2 == 0) {
                $result = $i;
                break;
            }
            $i++;
        }

        $this->assertEquals(__, $result);
    }

    /**
     * @testdox Continue (next) skips current iteration
     */
    public function testNextStatement()
    {
        $i = 0;
        $result = [];
        while ($i < 10) {
            $i++;
            if ($i % 2 == 0) {
                continue;
            }
            $result[] = $i;
        }

        $this->assertEquals(__, $result);
    }

    /**
     * @testdox Foreach loops through array elements
     */
    public function testForStatement()
    {
        $array = ['fish', 'and', 'chips'];
        $result = [];
        foreach ($array as $item) {
            $result[] = strtoupper($item);
        }

        $this->assertEquals([__, __, __], $result);
    }

    /**
     * @testdox For loop counts up to 10
     */
    public function testTimesStatement()
    {
        $sum = 0;
        for ($i = 0; $i < 10; $i++) {
            $sum += 1;
        }

        $this->assertEquals(__, $sum);
    }
}
