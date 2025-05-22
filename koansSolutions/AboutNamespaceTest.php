<?php

namespace Koans;

use PHPUnit\Framework\TestCase;

trait Nameable
{
    protected string $name;

    public function setName(string $newName) 
    {
        $this->name = $newName;
    }

    public function here() 
    {
        return 'in_trait';
    }
}

class DogUsingNameable
{
    use Nameable;

    public function __construct()
    {
        $this->name = "Fido";
    }

    public function bark() 
    {
        return "WOOF";
    }

    public function getName() 
    {
        return $this->name;
    }

    public function here() 
    {
        return 'in_class';
    }
}

class AboutNamespaceTest extends TestCase
{
    // public function test_traits_cannot_be_instantiated()
    // {
    //     $this->expectError(); // Because PHP will emit a fatal error for instantiating traits
    //     $trait = new \Koans\Nameable();
    // }

    public function test_normal_methods_are_available_in_the_object()
    {
        $dog = new \Koans\DogUsingNameable();
        $this->assertEquals("WOOF", $dog->bark());
    }

    public function test_trait_methods_are_also_available_in_the_object()
    {
        $dog = new \Koans\DogUsingNameable();
        $this->assertNull($dog->setName("Rover"));
    }

    public function test_trait_methods_can_affect_instance_variables_in_the_object()
    {
        $dog = new \Koans\DogUsingNameable();
        $this->assertEquals("Fido", $dog->getName());
        $dog->setName("Rover");
        $this->assertEquals("Rover", $dog->getName());
    }

    public function test_classes_can_override_trait_methods()
    {
        $dog = new \Koans\DogUsingNameable();
        $this->assertEquals("in_class", $dog->here());
    }
}
