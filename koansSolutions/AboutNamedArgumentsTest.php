<?php

use PHPUnit\Framework\TestCase;

class AboutNamedArgumentsTest extends TestCase
{
    public function methodWithNamedArguments($one = 1, $two = 'two'): array
    {
        return [$one, $two];
    }

    public function test_named_arguments_behavior(): void
    {
        $this->assertEquals('Closure', get_class(Closure::fromCallable([$this, 'methodWithNamedArguments'])));
        $this->assertEquals([1, 'two'], $this->methodWithNamedArguments());
        $this->assertEquals(['one', 'two'], $this->methodWithNamedArguments(one: 'one'));
        $this->assertEquals([1, 2], $this->methodWithNamedArguments(two: 2));
    }

    public function methodWithNamedAndRequiredArguments($one, int $two = 2, int $three = 3): array
    {
        return [$one, $two, $three];
    }

    // public function test_missing_required_argument_throws_error(): void
    // {
    //     // $this->expectException(ArgumentCountError::class);
    //     // $this->expectExceptionMessageMatches('/too few arguments/');
    //     $this->methodWithNamedAndRequiredArguments();
    // }

    public function methodWithMandatoryNamedArgument(int $one, string $two = 'two'): array
    {
        return [$one, $two];
    }

    public function test_mandatory_named_argument_works(): void
    {
        $this->assertEquals(['one', 'two'], $this->methodWithMandatoryNamedArgument(one: 'one'));
        $this->assertEquals([1, 2], $this->methodWithMandatoryNamedArgument(two: 2, one: 1));
    }

    public function test_missing_mandatory_named_argument_throws_error(): void
    {
        $this->expectException(ArgumentCountError::class);
        $this->expectExceptionMessageMatches('/too few arguments/');
        $this->methodWithMandatoryNamedArgument();
    }
}
