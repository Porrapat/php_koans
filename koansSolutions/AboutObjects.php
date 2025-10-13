<?php
namespace Koans;

use KoansLib\KoansTestCase;

class AboutObjects extends KoansTestCase
{
    /**
     * @testdox Understand what is and isn’t an object
     */
    public function test_what_is_an_object()
    {
        $this->assertFalse(is_object(1));             // In PHP, 1 is not an object
        $this->assertFalse(is_object(1.5));           // Same here, not an object
        $this->assertFalse(is_object("string"));      // Also not an object
        $this->assertFalse(is_object(null));          // null is not an object
    }

    /**
     * @testdox Primitives can be converted to strings
     */
    public function test_primitives_can_be_converted_to_strings()
    {
        $this->assertEquals('123', strval(123));
        $this->assertEquals('', strval(null));
    }

    /**
     * @testdox Primitives and values can be inspected as strings
     */
    public function test_primitives_can_be_inspected()
    {
        $this->assertEquals('123', var_export(123, true));
        $this->assertEquals('NULL', var_export(null, true));
    }

    /**
     * @testdox Primitive values like integers do not have object IDs
     */
    public function test_small_integers_do_not_have_object_ids()
    {
        // In PHP, numbers are not objects, so they don’t have object IDs
        $this->assertFalse(is_object(0));
        $this->assertFalse(is_object(1));
        $this->assertFalse(is_object(2));
        $this->assertFalse(is_object(100));
    }
}
