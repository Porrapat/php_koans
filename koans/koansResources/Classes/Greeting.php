<?php

namespace Koans\koansResources\Classes;

class Greeting
{
    public function greet($name): string
    {
        return 'Hello, ' . $name . '!';
    }
}
