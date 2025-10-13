<?php

namespace Koans;

use Error;
use KoansLib\KoansResources\Classes\Car;
use KoansLib\KoansResources\Classes\ExampleClass;
use KoansLib\KoansResources\Classes\SportCar;
use KoansLib\KoansTestCase;

// Resources for learning about Classes and Objects => https://www.w3schools.com/php/php_oop_classes_objects.asp
class AboutClasses extends KoansTestCase
{
    /**
     * @testdox You can create multiple instances of a class (objects)
     */
    public function testDefinesAClassUsingClassKeyword()
    {
        $exampleClass = 'I want to be an object of class ExampleClass';

        $this->assertTrue(is_object($exampleClass));
    }

    /**
     * @testdox Classes can have properties and can only be accessed if they are public
     */
    public function testAccessToAPublicProperty()
    {
        $exampleClass = new ExampleClass();

        $this->assertEquals(__, $exampleClass->exampleProperty);
    }

    /**
     * @testdox Methods can be defined in a class
     */
    public function testUsesAMethodDefinedInExampleClass()
    {
        $exampleClass = new ExampleClass();

        $this->assertEquals(__, $exampleClass->exampleMethod());
    }

    /**
     * @testdox Classes can have constructors => https://www.w3schools.com/php/php_oop_constructor.asp
     */
    public function testInitializesPropertiesWithConstructor()
    {
        $car = new Car(__, __);

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

        $this->assertEquals(__, $car->color);
        $this->assertEquals(__, $car->getBrand());
    }

    /**
     * @testdox Static properties and methods => https://www.w3schools.com/php/php_oop_static_properties.asp
     */
    public function testUsesStaticPropsAndMethodsWithNoInstance()
    {
        Car::$counter++;

        $this->assertEquals(__, Car::$counter);
        $this->assertEquals(__, Car::getCount());
    }

    /**
     * @testdox Protected methods and properties cannot be accessed directly from outside the class
     */
    public function testUsesPublicMethodsToAccessToProtectedProperties()
    {
        $car = new Car('yellow', 'Mercedes');

        $this->assertEquals('This is protected', $car->protectedProperty);
    }

    /**
     * @testdox Child classes can inherit properties and methods from their parent class
     */
    public function testUsesInheritedPublicProtectedPropsMethods()
    {
        $sportCar = new SportCar('blue', 'Toyota');

        SportCar::$counter++;
        $sportCar->setColor('red');

        $this->assertEquals(__, $sportCar::getCount());
        $this->assertEquals(__, $sportCar->color);
        $this->assertEquals(__, $sportCar->getBrand());
    }

    /**
     * @testdox Child classes can override methods from the parent class
     */
    public function testUsesTheOverridenMethodsInTheChildClass()
    {
        $sportCar = new SportCar('yellow', 'Ferrari');

        $this->assertEquals('Engine started', $sportCar->startEngine());
        $this->assertEquals('Driving at 200 km/h', $sportCar->drive(200));
    }

    /**
     * @testdox The protected properties and methods are visible in the subclass, but the private ones not
     */
    public function testChecksVisibilityOfInheritedPrivateProtectedPropsAndMethods()
    {
        $sportCar = new SportCar('yellow', 'Ferrari');

        $this->assertEquals('This is protected', $sportCar->getProtectedProperty());
        $this->assertEquals('Can I change?', $sportCar->getSecret());
    }
}
