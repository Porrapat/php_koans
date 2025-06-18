<?php

namespace Koans;

use PHPUnit\Framework\TestCase;
use Koans\koansResources\Classes\DogUsingNameable;

class AboutNamespace extends TestCase
{
    /**
     * @testdox A class can use its own method normally
     */
    public function test_normal_methods_are_available_in_the_object()
    {
        $dog = new DogUsingNameable();
        $this->assertEquals(__, $dog->bark());
    }

    /**
     * @testdox A class using a trait has access to trait methods
     */
    public function test_trait_methods_are_also_available_in_the_object()
    {
        $dog = new DogUsingNameable();
        $dog->setName("Rover");
        $this->assertEquals(__, $dog->getName());
    }

    /**
     * @testdox Trait methods can manipulate class properties
     */
    public function test_trait_methods_can_affect_instance_variables_in_the_object()
    {
        $dog = new DogUsingNameable();
        $this->assertEquals(__, $dog->getName());
        $dog->setName("Rover");
        $this->assertEquals(__, $dog->getName());
    }

    /**
     * @testdox A class can override methods from traits
     */
    public function test_classes_can_override_trait_methods()
    {
        $dog = new DogUsingNameable();
        $this->assertEquals(__, $dog->here());
    }
}
