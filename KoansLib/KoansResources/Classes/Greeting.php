<?php

namespace KoansLib\KoansResources\Classes;

class Greeting
{
    public function greet($name): string
    {
        return 'Hello, ' . $name . '!';
    }
}
