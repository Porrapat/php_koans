<?php
namespace KoansLib;

class KoanIncomplete {
    // public function __toString() {
    //     return '__INCOMPLETE__';
    // }

    public function __toString(): string
    {
        throw new \RuntimeException('You must fill in the blank (__) before you can reach enlightenment.');
    }

    public function __call($name, $arguments)
    {
        throw new \RuntimeException('You must fill in the blank (__) before you can reach enlightenment.');
    }

    public function __invoke()
    {
        throw new \RuntimeException('You must fill in the blank (__) before you can reach enlightenment.');
    }

    public function __get($name)
    {
        throw new \RuntimeException('You must fill in the blank (__) before you can reach enlightenment.');
    }
}