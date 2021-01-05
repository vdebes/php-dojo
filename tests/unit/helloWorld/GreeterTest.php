<?php

namespace phpdojo\tests\unit\helloWorld;

use PHPStan\Testing\TestCase;
use vdebes\phpdojo\helloWorld\Greeter;

class GreeterTest extends TestCase
{
    /**
     * @testdox class is instantiable
     */
    public function testIsInstiable(): void
    {
        $testedInstance = new Greeter();
        self::assertIsObject($testedInstance);
    }

    /**
     * @testdox class is invokable
     */
    public function testIsInvokable(): void
    {
        $testedInstance = new Greeter();
        $testedInstance();

        self::assertNotNull($testedInstance);
    }

    /**
     * class invocation returns a string
     */
    public function testReturnsString(): void
    {
        $testedInstance = new Greeter();
        $output         = $testedInstance();

        self::assertIsString($output);
    }

    /**
     * class invocation returns a "Hello, World!" string
     */
    public function testReturnsHelloWorldString(): void
    {
        $testedInstance = new Greeter();
        $output         = $testedInstance();

        self::assertSame('Hello, World!', $output);
    }

    /**
     * @testdox Greeter invocation returns a string which is "Hello, World!"
     *
     * This test validates all the previous ones in one pass. This kata could also have been done starting with this
     * only test and amending it iteration after iteration until the specifications were met.
     */
    public function testGreeter(): void
    {
        $testedInstance = new Greeter();

        $output = $testedInstance();

        self::assertIsString($output);
        self::assertSame('Hello, World!', $output);
    }
}
