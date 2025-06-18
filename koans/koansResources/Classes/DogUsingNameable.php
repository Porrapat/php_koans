<?php
namespace Koans\koansResources\Classes;

trait Nameable
{
    protected string $name;

    public function setName(string $newName): void
    {
        $this->name = $newName;
    }

    public function here(): string
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

    public function bark(): string
    {
        return "WOOF";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function here(): string
    {
        return 'in_class';
    }
}