<?php

namespace Koans\koansResources\Classes;

class Car
{
    public $color;
    private $brand;
    private $privateProperty = 'This is hidden out of the class';
    protected $protectedProperty = 'This is protected';
    public static $counter = 0;

    public function __construct($color, $brand)
    {
        $this->color = $color;
        $this->brand = $brand;
    }

    public function getBrand() 
    {
        return $this->brand;
    }

    public function setColor($color) 
    {
        $this->color = $color;
    }

    public function getSecret() 
    {
        return $this->privateProperty;
    }

    public function getProtectedProperty() 
    {
        return $this->protectedProperty;
    }

    public function startEngine() 
    {
        return 'Engine started!';
    }

    public function drive($speed) 
    {
        return 'Driving at ' . $speed . ' km/h';
    }

    public static function getCount()
    {
        return self::$counter;
    }
}
