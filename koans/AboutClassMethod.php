<?php

use PHPUnit\Framework\TestCase;
use Koans\koansResources\Classes\Dog;

class AboutClassMethod extends TestCase
{
    public static function my_global_method($a, $b)
    {
        return $a + $b;
    }

    public function test_calling_global_methods()
    {
        $this->assertEquals(__, self::my_global_method(2, 3));
    }

    public function test_calling_global_methods_without_parentheses()
    {
        $result = self::my_global_method(2, 3);
        $this->assertEquals(__, $result);
    }

    public function test_sometimes_missing_parentheses_are_ambiguous()
    {
        // PHP requires parentheses, so ambiguity like Ruby does not exist.
        $this->assertEquals(__, self::my_global_method(2, 3));
    }

    public function test_calling_global_methods_with_wrong_number_of_arguments()
    {
        $this->expectException(ArgumentCountError::class);
        self::my_global_method();

        $this->expectException(ArgumentCountError::class);
        self::my_global_method(1, 2, 3);
    }

    public static function method_with_defaults($a, $b = 'default_value')
    {
        return [$a, $b];
    }

    public function test_calling_with_default_values()
    {
        $this->assertEquals(__, self::method_with_defaults(1));
        $this->assertEquals(__, self::method_with_defaults(1, 2));
    }

    public static function method_with_var_args(...$args)
    {
        return $args;
    }

    public function test_calling_with_variable_arguments()
    {
        $this->assertEquals(__, gettype(self::method_with_var_args()));
        $this->assertEquals(__, self::method_with_var_args());
        $this->assertEquals(__, self::method_with_var_args('one'));
        $this->assertEquals(__, self::method_with_var_args('one', 'two'));
    }

    public static function method_with_explicit_return()
    {
        return 'return_value';
    }

    public function test_method_with_explicit_return()
    {
        $this->assertEquals(__, self::method_with_explicit_return());
    }

    public static function method_without_explicit_return()
    {
        return 'return_value';
    }

    public function test_method_without_explicit_return()
    {
        $this->assertEquals(__, self::method_without_explicit_return());
    }

    public function my_method_in_the_same_class($a, $b)
    {
        return $a * $b;
    }

    public function test_calling_methods_in_same_class()
    {
        $this->assertEquals(__, $this->my_method_in_the_same_class(3, 4));
    }

    public function test_calling_methods_in_same_class_with_explicit_receiver()
    {
        $this->assertEquals(__, $this->my_method_in_the_same_class(3, 4));
    }

    private function my_private_method()
    {
        return "a secret";
    }

    public function test_calling_private_methods_without_receiver()
    {
        $this->assertEquals(__, $this->my_private_method());
    }

    public function test_calling_private_methods_with_an_explicit_receiver()
    {
        $this->assertEquals(__, $this->my_private_method());
    }

    public function test_calling_methods_in_other_objects_require_explicit_receiver()
    {
        $rover = new Dog();
        $this->assertEquals(__, $rover->name());
    }
}

