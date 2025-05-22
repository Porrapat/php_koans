<?php
use PHPUnit\Framework\TestCase;

class AboutNullTest extends TestCase
{
    /**
     * @testdox Understand that null is a primitive and not an object
     */
    public function testNullIsPrimitive()
    {
        // In PHP, null is NOT an object, it's a special type.
        $this->assertFalse(is_object(null), "In PHP, null is NOT an object, it's a special type.");
    }

    /**
     * @testdox Understand that calling a method on null causes an Error
     */
    public function testCallingMethodsOnNullCausesError()
    {
        try {
            null->someMethodNullDoesntKnowAbout();
            $this->fail("Expected Error was not thrown");
        } catch (Error $e) {
            $this->assertEquals(Error::class, get_class($e));
            $this->assertMatchesRegularExpression('/'.__.'/', $e->getMessage());
        }
    }

    /**
     * @testdox Explore null’s behavior with comparisons and casting
     */
    public function testNullHasSomeBehavior()
    {
        $this->assertTrue(__ === null);
        $this->assertTrue(__ == null);
        $this->assertTrue(is_null(null));
        $this->assertEquals("", (string) null);                 // Casting to string
        $this->assertEquals(__, var_export(null, true));    // PHP's inspect-like output
    }
}
