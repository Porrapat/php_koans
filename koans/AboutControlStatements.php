<?php

namespace Koans;

use PHPUnit\Framework\TestCase;

class AboutControlStatements extends TestCase
{
    public function testIfThenElseStatements()
    {
        if (true) {
            $result = 'true_value';
        } else {
            $result = 'false_value';
        }

        $this->assertEquals(__, $result);
    }

    public function testIfThenStatements()
    {
        $result = 'default_value';
        if (true) {
            $result = 'true_value';
        }

        $this->assertEquals(__, $result);
    }

    public function testIfStatementsReturnValues()
    {
        $value = (true ? 'true_value' : 'false_value');
        $this->assertEquals(__, $value);

        $value = (false ? 'true_value' : 'false_value');
        $this->assertEquals(__, $value);
    }

    public function testIfStatementWithNoElseFalseCondition()
    {
        $value = null;
        if (false) {
            $value = 'true_value';
        }

        $this->assertEquals(__, $value);
    }

    public function testConditionOperators()
    {
        $this->assertEquals(__, (true ? 'true_value' : 'false_value'));
        $this->assertEquals(__, (false ? 'true_value' : 'false_value'));
    }

    public function testIfStatementModifier()
    {
        $result = 'default_value';
        if (true) $result = 'true_value';

        $this->assertEquals(__, $result);
    }

    public function testUnlessStatement()
    {
        $result = 'default_value';
        if (!false) {
            $result = 'false_value';
        }

        $this->assertEquals(__, $result);
    }

    public function testUnlessStatementEvaluateTrue()
    {
        $result = 'default_value';
        if (!true) {
            $result = 'true_value';
        }

        $this->assertEquals(__, $result);
    }

    public function testUnlessStatementModifier()
    {
        $result = 'default_value';
        if (!false) $result = 'false_value';

        $this->assertEquals(__, $result);
    }

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

    public function testForStatement()
    {
        $array = ['fish', 'and', 'chips'];
        $result = [];
        foreach ($array as $item) {
            $result[] = strtoupper($item);
        }

        $this->assertEquals([__, __, __], $result);
    }

    public function testTimesStatement()
    {
        $sum = 0;
        for ($i = 0; $i < 10; $i++) {
            $sum += 1;
        }

        $this->assertEquals(__, $sum);
    }
}
