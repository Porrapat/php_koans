<?php

namespace Koans;

use Error;
use KoansLib\KoansResources\Classes\Car;
use KoansLib\KoansResources\Classes\ExampleClass;
use KoansLib\KoansResources\Classes\SportCar;
use PHPUnit\Framework\TestCase;

// Resources for learning about Classes and Objects => https://www.w3schools.com/php/php_oop_classes_objects.asp
class AboutClasses extends TestCase
{
    /**
     * @test
     * @testdox You can create multiple instances of a class (objects)
     */
    public function definesAClassUsingClassKeyword()
    {
        $exampleClass = new ExampleClass();

        $this->assertTrue(is_object($exampleClass));
    }

    /**
     * @test
     * @testdox Classes can have properties and can only be accessed if they are public
     */
    public function accessToAPublicProperty()
    {
        $exampleClass = new ExampleClass();

        $this->assertEquals("Hi, I'm a property", $exampleClass->exampleProperty);
    }

    /**
     * @test
     * @testdox Methods can be defined in a class
     */
    public function usesAMethodDefinedInExampleClass()
    {
        $exampleClass = new ExampleClass();

        $this->assertEquals("Hi, I'm a method", $exampleClass->exampleMethod());
    }

    /**
     * @test
     * @testdox Classes can have constructors => https://www.w3schools.com/php/php_oop_constructor.asp
     */
    public function initializesPropertiesWithConstructor()
    {
        $car = new Car('blue', 'Ferrari');

        $this->assertEquals('blue', $car->color);
        $this->assertEquals('Ferrari', $car->getBrand());
    }

    /**
     * @test
     * @testdox Classes can have getters and setters methods to access and set value to properties
     */
    public function usesGettersAndSettersToSetAndGetPropertiesValues()
    {
        $car = new Car('yellow', 'Aston Martin');

        $car->setColor('red');

        $this->assertEquals('red', $car->color);
        $this->assertEquals('Aston Martin', $car->getBrand());
    }

    /**
     * @test
     * @testdox Static properties and methods => https://www.w3schools.com/php/php_oop_static_properties.asp
     */
    public function usesStaticPropsAndMethodsWithNoInstance()
    {
        Car::$counter++;

        $this->assertEquals(1, Car::$counter);
        $this->assertEquals(1, Car::getCount());
    }

    /**
     * @test
     * @testdox Private methods and properties cannot be accessed directly from outside the class
     */
    public function usesTheCorrectExceptionMessageToPassTheTest()
    {
        $car = new Car('yellow', 'Mercedes');

        $this->expectException(Error::class);
        $this->expectExceptionMessage('Cannot access private property');
        $car->privateProperty;
    }

    /**
     * @test
     * @testdox Protected methods and properties cannot be accessed directly from outside the class
     */
    public function usesPublicMethodsToAccessToProtectedProperties()
    {
        $car = new Car('yellow', 'Mercedes');

        $this->assertEquals('This is protected', $car->getProtectedProperty());
    }

    /**
     * @test
     * @testdox Child classes can inherit properties and methods from their parent class
     */
    public function usesInheritedPublicProtectedPropsMethods()
    {
        $sportCar = new SportCar('blue', 'Toyota');

        SportCar::$counter++;
        $sportCar->setColor('red');

        $this->assertEquals(2, $sportCar::getCount());
        $this->assertEquals('red', $sportCar->color);
        $this->assertEquals('Toyota', $sportCar->getBrand());
    }

    /**
     * @test
     * @testdox Child classes can override methods from the parent class
     */
    public function usesTheOverridenMethodsInTheChildClass()
    {
        $sportCar = new SportCar('yellow', 'Ferrari');

        $this->assertEquals('Engine started with turbo!', $sportCar->startEngine());
        $this->assertEquals('Driving at 200 m/h', $sportCar->drive(200));
    }

    /**
     * @test
     * @testdox The protected properties and methods are visible in the subclass, but the private ones not
     */
    public function checksVisibilityOfInheritedPrivateProtectedPropsAndMethods()
    {
        $sportCar = new SportCar('yellow', 'Ferrari');

        $this->assertEquals('The protected properties are visible in the subclass', $sportCar->getProtectedProperty());
        $this->assertEquals('This is hidden out of the class', $sportCar->getSecret());
    }
}
