<?php
namespace Koans;

use KoansLib\KoansTestCase;

// Triangle Project Code.

// Triangle analyzes the lengths of the sides of a triangle
// (represented by a, b and c) and returns the type of triangle.
//
// It returns:
//   'equilateral'  if all sides are equal
//   'isosceles'    if exactly 2 sides are equal
//   'scalene'      if no sides are equal
//
function triangle($a, $b, $c): string
{
    return __;
}

class AboutTriangleProject extends KoansTestCase
{
    /**
     * @testdox Equilateral triangles have equal sides
     */
    public function testEquilateralTrianglesHaveEqualSides()
    {
        $this->assertEquals('equilateral', triangle(2, 2, 2));
        $this->assertEquals('equilateral', triangle(10, 10, 10));
    }

    /**
     * @testdox Isosceles triangles have exactly two sides equal
     */
    public function testIsoscelesTrianglesHaveExactlyTwoSidesEqual()
    {
        $this->assertEquals('isosceles', triangle(3, 4, 4));
        $this->assertEquals('isosceles', triangle(4, 3, 4));
        $this->assertEquals('isosceles', triangle(4, 4, 3));
        $this->assertEquals('isosceles', triangle(10, 10, 2));
    }

    /**
     * @testdox Scalene triangles have no equal sides
     */
    public function testScaleneTrianglesHaveNoEqualSides()
    {
        $this->assertEquals('scalene', triangle(3, 4, 5));
        $this->assertEquals('scalene', triangle(10, 11, 12));
        $this->assertEquals('scalene', triangle(5, 4, 2));
    }
}

