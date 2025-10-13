<?php

namespace KoansLib;

abstract class KoansTestCase
{
    protected static $passedTests = 0;
    protected static $failedTests = 0;
    protected static $totalTests = 0;
    protected static $firstFailure = null;

    /**
     * Assert that a condition is true
     */
    protected function assertTrue($condition, $message = '')
    {
        if ($condition !== true) {
            $this->fail($message ?: 'Failed asserting that condition is true.');
        }
    }

    /**
     * Assert that a condition is false
     */
    protected function assertFalse($condition, $message = '')
    {
        if ($condition !== false) {
            $this->fail($message ?: 'Failed asserting that condition is false.');
        }
    }

    /**
     * Assert that two values are equal (with type juggling)
     */
    protected function assertEquals($expected, $actual, $message = '')
    {
        if ($expected != $actual) {
            $expectedStr = $this->varToString($expected);
            $actualStr = $this->varToString($actual);
            $this->fail($message ?: "Failed asserting that $actualStr equals $expectedStr.");
        }
    }

    /**
     * Assert that two values are identical (strict type checking)
     */
    protected function assertSame($expected, $actual, $message = '')
    {
        if ($expected !== $actual) {
            $expectedStr = $this->varToString($expected);
            $actualStr = $this->varToString($actual);
            $expectedType = gettype($expected);
            $actualType = gettype($actual);
            $this->fail($message ?: "Failed asserting that $actualStr ($actualType) is identical to $expectedStr ($expectedType).");
        }
    }

    /**
     * Assert that two values are not equal
     */
    protected function assertNotEquals($expected, $actual, $message = '')
    {
        if ($expected == $actual) {
            $expectedStr = $this->varToString($expected);
            $this->fail($message ?: "Failed asserting that value does not equal $expectedStr.");
        }
    }

    /**
     * Assert that a value is null
     */
    protected function assertNull($actual, $message = '')
    {
        if ($actual !== null) {
            $actualStr = $this->varToString($actual);
            $this->fail($message ?: "Failed asserting that $actualStr is null.");
        }
    }

    /**
     * Assert that a value is not null
     */
    protected function assertNotNull($actual, $message = '')
    {
        if ($actual === null) {
            $this->fail($message ?: 'Failed asserting that value is not null.');
        }
    }

    /**
     * Assert that an array has a specific key
     */
    protected function assertArrayHasKey($key, $array, $message = '')
    {
        if (!is_array($array) || !array_key_exists($key, $array)) {
            $this->fail($message ?: "Failed asserting that array has key '$key'.");
        }
    }

    /**
     * Assert that a string contains a substring
     */
    protected function assertStringContainsString($needle, $haystack, $message = '')
    {
        if (strpos($haystack, $needle) === false) {
            $this->fail($message ?: "Failed asserting that '$haystack' contains '$needle'.");
        }
    }

    /**
     * Assert that a value matches a regular expression
     */
    protected function assertMatchesRegularExpression($pattern, $string, $message = '')
    {
        if (!preg_match($pattern, $string)) {
            $this->fail($message ?: "Failed asserting that '$string' matches pattern '$pattern'.");
        }
    }

    /**
     * Assert that a value is an instance of a class
     */
    protected function assertInstanceOf($expected, $actual, $message = '')
    {
        if (!($actual instanceof $expected)) {
            $actualClass = is_object($actual) ? get_class($actual) : gettype($actual);
            $this->fail($message ?: "Failed asserting that $actualClass is an instance of $expected.");
        }
    }

    /**
     * Assert that a value is of a specific type
     */
    protected function assertIsString($actual, $message = '')
    {
        if (!is_string($actual)) {
            $this->fail($message ?: 'Failed asserting that value is a string.');
        }
    }

    protected function assertIsInt($actual, $message = '')
    {
        if (!is_int($actual)) {
            $this->fail($message ?: 'Failed asserting that value is an integer.');
        }
    }

    protected function assertIsArray($actual, $message = '')
    {
        if (!is_array($actual)) {
            $this->fail($message ?: 'Failed asserting that value is an array.');
        }
    }

    protected function assertIsBool($actual, $message = '')
    {
        if (!is_bool($actual)) {
            $this->fail($message ?: 'Failed asserting that value is a boolean.');
        }
    }

    protected function assertIsFloat($actual, $message = '')
    {
        if (!is_float($actual)) {
            $this->fail($message ?: 'Failed asserting that value is a float.');
        }
    }

    /**
     * Fail the current test
     */
    protected function fail($message)
    {
        throw new KoansAssertionException($message);
    }

    /**
     * Convert a variable to a readable string representation
     */
    private function varToString($var)
    {
        if (is_string($var)) {
            return "'$var'";
        } elseif (is_bool($var)) {
            return $var ? 'true' : 'false';
        } elseif (is_null($var)) {
            return 'null';
        } elseif (is_array($var)) {
            return json_encode($var);
        } elseif (is_object($var)) {
            return get_class($var) . ' object';
        } else {
            return (string)$var;
        }
    }

    /**
     * Get all test methods in the current class
     */
    public function getTestMethods()
    {
        $methods = get_class_methods($this);
        $testMethods = [];

        foreach ($methods as $method) {
            if (strpos($method, 'test') === 0) {
                $testMethods[] = $method;
            }
        }

        return $testMethods;
    }

    /**
     * Get the testdox comment for a method
     */
    public function getTestDox($methodName)
    {
        $reflection = new \ReflectionMethod($this, $methodName);
        $docComment = $reflection->getDocComment();

        if (preg_match('/@testdox\s+(.+)/', $docComment, $matches)) {
            return trim($matches[1]);
        }

        // Convert method name to readable format
        $name = preg_replace('/^test/', '', $methodName);
        $name = preg_replace('/([A-Z])/', ' $1', $name);
        return trim($name);
    }
}

class KoansAssertionException extends \Exception
{
}
