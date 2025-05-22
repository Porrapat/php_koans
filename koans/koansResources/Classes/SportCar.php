<?php

namespace Koans\koansResources\Classes;

class SportCar extends Car
{
    protected $protectedProperty = 'The protected properties are visible in the subclass';
    private $privateProperty = 'Can I change?';

    public function startEngine() 
    {
        return 'Engine started with turbo!';
    }

    public function drive($speed) 
    {
        return 'Driving at ' . $speed . ' m/h';
    }
}
