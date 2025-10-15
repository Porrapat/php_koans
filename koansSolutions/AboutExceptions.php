<?php

namespace Koans;

use Exception;
use LogicException;
use KoansLib\KoansResources\Exceptions\CustomGenericException;
use KoansLib\KoansTestCase;
use RuntimeException;

// Resources for learning about Exceptions => https://www.w3schools.com/php/php_exceptions.asp
class AboutExceptions extends KoansTestCase
{
    /**
     * @testdox Exceptions can be thrown using the `throw` keyword
     */
    public function testUsesExpectExceptionMessage()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Something went wrong');

        throw new Exception('Something went wrong');
    }

    /**
     * @testdox Catching exceptions using try-catch blocks
     */
    public function testUsesTryCatchStatementToCatchExceptionsAndContinueTheProcess()
    {
        try {
            throw new Exception('Something went wrong');
        } catch (Exception $exception) {
            $this->assertEquals('Something went wrong', $exception->getMessage());
        }
    }

    /**
     * @testdox Catching multiple exceptions using separate catch blocks
     */
    public function testUsesTwoCatchBlocksToCatchMultipleExceptions()
    {
        try {
            throw new RuntimeException('Runtime exception occurred');
        } catch (RuntimeException $exception) {
            $this->assertEquals('Runtime exception occurred', $exception->getMessage());
        } catch (Exception $exception) {
            $this->fail('Should not catch this exception');
        }
    }

    /**
     * @testdox Catching multiple exceptions using a single catch block
     */
    public function testCatchesMultipleExceptionsSingleBlockUsingPipes()
    {
        try {
            throw new RuntimeException('Runtime exception occurred');
        } catch (RuntimeException | LogicException $exception) {
            $this->assertEquals('Runtime exception occurred', $exception->getMessage());
        } catch (Exception $exception) {
            $this->fail('Should not catch this exception');
        }
    }

    /**
     * @testdox The finally block is executed regardless of whether an exception is thrown or caught
     */
    public function testUsesFinallyBlockToExecuteSomethingAtTheEndOfTheTryCatchBlock()
    {
        try {
            throw new Exception('Something went wrong');
        } catch (Exception $exception) {
            $this->assertEquals('Something went wrong', $exception->getMessage());
        } finally {
            $this->assertTrue(true);
        }
    }

    /**
     * @testdox Custom exception classes can be defined by extending the base Exception class
     */
    public function testCreatesCustomExceptionsByExtendingTheExceptionClass()
    {
        $this->expectException(CustomGenericException::class);
        $this->expectExceptionMessage("Some kind of madness");
        throw new CustomGenericException();
    }
}
