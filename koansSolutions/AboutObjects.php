<?php

use PHPUnit\Framework\TestCase;

class AboutObjects extends TestCase
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
        $this->assertTrue(is_object(new stdClass()));             // This is truly an object -- new stdClass()
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
     * @testdox Every object has an internal ID
     */
    public function test_every_object_has_an_id()
    {
        $obj = new stdClass();
        $this->assertTrue(is_int(spl_object_id($obj)));
    }

    /**
     * @testdox Each object instance has a different ID
     */
    public function test_every_object_has_different_id()
    {
        $obj = new stdClass();
        $anotherObj = new stdClass();
        $this->assertNotEquals(spl_object_id($obj), spl_object_id($anotherObj));
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

    /**
     * @testdox Cloning an object creates a different object with a new ID
     */
    public function test_clone_creates_a_different_object()
    {
        $obj = new stdClass();
        $copy = clone $obj;

        $this->assertNotSame($obj, $copy);
        $this->assertNotEquals(spl_object_id($obj), spl_object_id($copy));
    }
}
