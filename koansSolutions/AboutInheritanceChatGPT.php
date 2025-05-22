<?php

use PHPUnit\Framework\TestCase;

class AboutInheritanceChatGPT extends TestCase
{
    /**
     * @testdox Classes can inherit methods and properties from parent classes
     */
    public function testBasicInheritance()
    {
        class Animal
        {
            public function speak(): string
            {
                return '...';
            }
        }

        class Dog extends Animal
        {
            public function speak(): string
            {
                return 'Woof';
            }
        }

        $dog = new Dog();
        $this->assertEquals(__, $dog->speak());
    }

    /**
     * @testdox Child class inherits public properties from parent
     */
    public function testInheritedProperties()
    {
        class Vehicle
        {
            public $wheels = 4;
        }

        class Motorcycle extends Vehicle
        {
        }

        $moto = new Motorcycle();
        $this->assertEquals(__, $moto->wheels);
    }

    /**
     * @testdox Parent methods can be called using parent:: inside child
     */
    public function testCallingParentMethod()
    {
        class Bird
        {
            public function fly(): string
            {
                return 'Flying high';
            }
        }

        class Parrot extends Bird
        {
            public function fly(): string
            {
                return parent::fly() . ' and talking too';
            }
        }

        $parrot = new Parrot();
        $this->assertEquals(__, $parrot->fly());
    }

    /**
     * @testdox Parent constructor is not automatically called
     */
    public function testParentConstructor()
    {
        class Human
        {
            public $name;
            public function __construct()
            {
                $this->name = 'John Doe';
            }
        }

        class Programmer extends Human
        {
            public function __construct()
            {
                // Parent constructor not called unless we call it manually
            }
        }

        $coder = new Programmer();
        $this->assertEquals(__, $coder->name ?? null);
    }

    /**
     * @testdox Protected members are accessible in child class
     */
    public function testProtectedAccess()
    {
        class ParentClass
        {
            protected $secret = 'hidden';

            protected function reveal(): string
            {
                return $this->secret;
            }
        }

        class ChildClass extends ParentClass
        {
            public function showSecret(): string
            {
                return $this->reveal();
            }
        }

        $child = new ChildClass();
        $this->assertEquals(__, $child->showSecret());
    }
}
