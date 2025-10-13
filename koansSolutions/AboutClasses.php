<?php

namespace Koans;

use KoansLib\KoansTestCase;

use Error;
use KoansLib\KoansResources\Classes\Car;
use KoansLib\KoansResources\Classes\ExampleClass;
use KoansLib\KoansResources\Classes\SportCar;

// Resources for learning about Classes and Objects => https://www.w3schools.com/php/php_oop_classes_objects.asp
class AboutClasses extends KoansTestCase
{
    /**
     * @testdox You can create multiple instances of a class (objects)
     */
    public function testDefinesAClassUsingClassKeyword()
    {
        $exampleClass = new ExampleClass();

        $this->assertTrue(is_object($exampleClass));
    }

    /**
     * @testdox Classes can have properties and can only be accessed if they are public
     */
    public function testAccessToAPublicProperty()
    {
        $exampleClass = new ExampleClass();

        $this->assertEquals("Hi, I'm a property", $exampleClass->exampleProperty);
    }

    /**
     * @testdox Methods can be defined in a class
     */
    public function testUsesAMethodDefinedInExampleClass()
    {
        $exampleClass = new ExampleClass();

        $this->assertEquals("Hi, I'm a method", $exampleClass->exampleMethod());
    }

    /**
     * @testdox Classes can have constructors => https://www.w3schools.com/php/php_oop_constructor.asp
     */
    public function testInitializesPropertiesWithConstructor()
    {
        $car = new Car('blue', 'Ferrari');

        $this->assertEquals('blue', $car->color);
        $this->assertEquals('Ferrari', $car->getBrand());
    }

    /**
     * @testdox Classes can have getters and setters methods to access and set value to properties
     */
    public function testUsesGettersAndSettersToSetAndGetPropertiesValues()
    {
        $car = new Car('yellow', 'Aston Martin');

        $car->setColor('red');

        $this->assertEquals('red', $car->color);
        $this->assertEquals('Aston Martin', $car->getBrand());
    }

    /**
     * @testdox Static properties and methods => https://www.w3schools.com/php/php_oop_static_properties.asp
     */
    public function testUsesStaticPropsAndMethodsWithNoInstance()
    {
        Car::$counter++;

        $this->assertEquals(1, Car::$counter);
        $this->assertEquals(1, Car::getCount());
    }

    /**
     * @testdox Protected methods and properties cannot be accessed directly from outside the class
     */
    public function testUsesPublicMethodsToAccessToProtectedProperties()
    {
        $car = new Car('yellow', 'Mercedes');

        $this->assertEquals('This is protected', $car->getProtectedProperty());
    }

    /**
     * @testdox Child classes can inherit properties and methods from their parent class
     */
    public function testUsesInheritedPublicProtectedPropsMethods()
    {
        $sportCar = new SportCar('blue', 'Toyota');

        SportCar::$counter++;
        $sportCar->setColor('red');

        $this->assertEquals(2, $sportCar::getCount());
        $this->assertEquals('red', $sportCar->color);
        $this->assertEquals('Toyota', $sportCar->getBrand());
    }

    /**
     * @testdox Child classes can override methods from the parent class
     */
    public function testUsesTheOverridenMethodsInTheChildClass()
    {
        $sportCar = new SportCar('yellow', 'Ferrari');

        $this->assertEquals('Engine started with turbo!', $sportCar->startEngine());
        $this->assertEquals('Driving at 200 m/h', $sportCar->drive(200));
    }

    /**
     * @testdox The protected properties and methods are visible in the subclass, but the private ones not
     */
    public function testChecksVisibilityOfInheritedPrivateProtectedPropsAndMethods()
    {
        $sportCar = new SportCar('yellow', 'Ferrari');

        $this->assertEquals('The protected properties are visible in the subclass', $sportCar->getProtectedProperty());
        $this->assertEquals('This is hidden out of the class', $sportCar->getSecret());
    }
}
