<?php
namespace Koans;

use KoansLib\KoansTestCase;

class AboutArrayAssignment extends KoansTestCase
{
    /**
     * @testdox Can assign an array to a variable without parallel unpacking
     */
    public function test_non_parallel_assignment()
    {
        $names = ["John", "Smith"];
        $this->assertEquals(["John", "Smith"], $names);
    }

    /**
     * @testdox Can unpack values using parallel assignment
     */
    public function test_parallel_assignments()
    {
        [$firstName, $lastName] = ["John", "Smith"];
        $this->assertEquals("John", $firstName);
        $this->assertEquals("Smith", $lastName);
    }

    /**
     * @testdox Ignores extra values in parallel assignment
     */
    public function test_parallel_assignments_with_extra_values()
    {
        [$firstName, $lastName] = ["John", "Smith", "III"];
        $this->assertEquals("John", $firstName);
        $this->assertEquals("Smith", $lastName); // "III" is ignored
    }

    /**
     * @testdox Supports unpacking subarrays with parallel assignment
     */
    public function test_parallel_assignments_with_subarrays()
    {
        [$firstName, $lastName] = [["Willie", "Rae"], "Johnson"];
        $this->assertEquals(["Willie", "Rae"], $firstName);
        $this->assertEquals("Johnson", $lastName);
    }

    /**
     * @testdox Can unpack only the first value from an array
     */
    public function test_parallel_assignment_with_one_variable()
    {
        [$firstName] = ["John", "Smith"];
        $this->assertEquals("John", $firstName);
    }

    
    /**
     * @testdox Can swap variables using parallel assignment
     */
    public function test_swapping_with_parallel_assignment()
    {
        $firstName = "Roy";
        $lastName = "Rob";

        [$firstName, $lastName] = [$lastName, $firstName];

        $this->assertEquals("Rob", $firstName);
        $this->assertEquals("Roy", $lastName);
    }
}
