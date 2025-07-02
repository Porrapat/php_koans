<?php

namespace KoansLib\koansResources\Classes;

class SportCar extends Car
{
    protected string $protectedProperty = 'The protected properties are visible in the subclass';
    private string $privateProperty = 'Can I change?';

    public function startEngine(): string
    {
        return 'Engine started with turbo!';
    }

    public function drive($speed): string
    {
        return 'Driving at ' . $speed . ' m/h';
    }
}
