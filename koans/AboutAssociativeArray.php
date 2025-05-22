<?php
use PHPUnit\Framework\TestCase;

class AboutAssociativeArray extends TestCase
{
    /**
     * @testdox Creating an empty associative array results in an empty array type
     */
    public function test_creating_associative_arrays()
    {
        $empty_arr = [];
        $this->assertEquals(__, gettype($empty_arr));
        $this->assertEquals(__, $empty_arr);
        $this->assertEquals(__, count($empty_arr));
    }

    /**
     * @testdox Associative array literals can be declared using key => value syntax
     */
    public function test_associative_array_literals()
    {
        $arr = [ 'one' => 'uno', 'two' => 'dos' ];
        $this->assertEquals(__, count($arr));
    }

    /**
     * @testdox Associative array values can be accessed using their keys
     */
    public function test_accessing_associative_arrays()
    {
        $arr = [ 'one' => 'uno', 'two' => 'dos' ];
        $this->assertEquals(__, $arr['one']);
        $this->assertEquals(__, $arr['two']);
        $this->assertEquals(__, $arr['doesnt_exist'] ?? null);
    }

    /**
     * @testdox Accessing a non-existent key with fetch behavior can throw an exception
     */
    public function test_accessing_associative_arrays_with_fetch()
    {
        $arr = [ 'one' => 'uno' ];
        $this->assertEquals(__, $arr['one']);
        $this->expectException(\Exception::class);
        if (!array_key_exists('doesnt_exist', $arr)) {
            throw new \Exception("Key does not exist");
        }
    }

    /**
     * @testdox Values in an associative array can be changed by assigning to a key
     */
    public function test_changing_associative_arrays()
    {
        $arr = [ 'one' => 'uno', 'two' => 'dos' ];
        $arr['one'] = 'eins';

        $expected = [ 'one' => __, 'two' => 'dos' ];
        $this->assertEquals($expected, $arr);
    }

    /**
     * @testdox Associative arrays are unordered; key order does not affect equality
     */
    public function test_associative_array_is_unordered()
    {
        $arr1 = [ 'one' => 'uno', 'two' => 'dos' ];
        $arr2 = [ 'two' => __, 'one' => 'uno' ];

        $this->assertTrue($arr1 == $arr2);
    }

    /**
     * @testdox Keys of an associative array can be extracted using array_keys
     */
    public function test_associative_array_keys()
    {
        $arr = [ 'one' => 'uno', 'two' => 'dos' ];
        $this->assertEquals(__, count(array_keys($arr)));
        $this->assertTrue(in_array(__, array_keys($arr)));
        $this->assertTrue(in_array(__, array_keys($arr)));
        $this->assertEquals(__, gettype(array_keys($arr)));
    }

    /**
     * @testdox Values of an associative array can be extracted using array_values
     */
    public function test_associative_array_values()
    {
        $arr = [ 'one' => 'uno', 'two' => 'dos' ];
        $this->assertEquals(__, count(array_values($arr)));
        $this->assertTrue(in_array(__, array_values($arr)));
        $this->assertTrue(in_array(__, array_values($arr)));
        $this->assertEquals(__, gettype(array_values($arr)));
    }

    /**
     * @testdox Associative arrays can be combined using array_merge
     */
    public function test_combining_associative_arrays()
    {
        $arr = [ "jim" => 53, "amy" => 20, "dan" => 23 ];
        $new_arr = array_merge($arr, [ "jim" => 54, "jenny" => 26 ]);

        $this->assertNotEquals(__, $new_arr);

        $expected = [ "jim" => 54, "amy" => 20, "dan" => 23, "jenny" => 26 ];
        $this->assertEquals(__, $new_arr);
    }
}
