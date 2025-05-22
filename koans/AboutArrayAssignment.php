<?php

use PHPUnit\Framework\TestCase;

class AboutArrayAssignment extends TestCase
{
    /**
     * @testdox Can assign an array to a variable without parallel unpacking
     */
    public function test_non_parallel_assignment()
    {
        $names = ["John", "Smith"];
        $this->assertEquals([__, __], $names);
    }

    /**
     * @testdox Can unpack values using parallel assignment
     */
    public function test_parallel_assignments()
    {
        [$firstName, $lastName] = ["John", "Smith"];
        $this->assertEquals(__, $firstName);
        $this->assertEquals(__, $lastName);
    }

    /**
     * @testdox Ignores extra values in parallel assignment
     */
    public function test_parallel_assignments_with_extra_values()
    {
        [$firstName, $lastName] = ["John", "Smith", "III"];
        $this->assertEquals(__, $firstName);
        $this->assertEquals(__, $lastName); // "III" is ignored
    }

    /**
     * @testdox Supports unpacking subarrays with parallel assignment
     */
    public function test_parallel_assignments_with_subarrays()
    {
        [$firstName, $lastName] = [["Willie", "Rae"], "Johnson"];
        $this->assertEquals([__, __], $firstName);
        $this->assertEquals(__, $lastName);
    }

    /**
     * @testdox Can unpack only the first value from an array
     */
    public function test_parallel_assignment_with_one_variable()
    {
        [$firstName] = ["John", "Smith"];
        $this->assertEquals(__, $firstName);
    }

    
    /**
     * @testdox Can swap variables using parallel assignment
     */
    public function test_swapping_with_parallel_assignment()
    {
        $firstName = "Roy";
        $lastName = "Rob";

        [$firstName, $lastName] = [$lastName, $firstName];

        $this->assertEquals(__, $firstName);
        $this->assertEquals(__, $lastName);
    }
}
