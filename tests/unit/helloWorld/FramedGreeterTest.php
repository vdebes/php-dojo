<?php

namespace phpdojo\tests\unit\helloWorld;

use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;
use vdebes\phpdojo\helloWorld\FramedGreeter;
use vdebes\phpdojo\helloWorld\Greet as GreetAlias;

class FramedGreeterTest extends TestCase
{
    private const MESSAGE = "Hello, World!";
    /** @var MockInterface&GreetAlias */
    private $greeterMock;

    public function setUp(): void
    {
        $this->greeterMock = \Mockery::mock(GreetAlias::class);
        $this->greeterMock->shouldReceive('__invoke')->andReturn(self::MESSAGE);

        parent::setUp();
    }

    /**
     * @testdox Framed greeter surrounds the message with * characters
     */
    public function testFramedGreeter(): void
    {
        $testedInstance = new FramedGreeter($this->greeterMock);

        self::assertIsObject($testedInstance);
        self::assertInstanceOf(GreetAlias::class, $testedInstance);
        self::assertIsString($output = $testedInstance());
        self::assertStringContainsString(self::MESSAGE, $output);
    }

    /**
     * @testdox Output starts and ends with a line of * as long as the message +2
     */
    public function testGreeterStartAndEnd(): void
    {
        $expectedLine = "***************";

        $testedInstance = new FramedGreeter($this->greeterMock);

        self::assertStringStartsWith($expectedLine.PHP_EOL, $output = $testedInstance());
        self::assertStringEndsWith(PHP_EOL.$expectedLine, $output);
    }

    /**
     * @testdox Output surrounds the string with one star each side
     */
    public function testGreeterSurroundsStringWithOneStarEachSide(): void
    {
        $testedInstance = new FramedGreeter($this->greeterMock);

        self::assertStringContainsString('*'.self::MESSAGE.'*', $testedInstance());
    }

    /**
     * @testdox Output is totally surround by * signs
     */
    public function testGreeterOutputsExactly(): void
    {
        $messageOutput = "***************\n*Hello, World!*\n***************";

        $testedInstance = new FramedGreeter($this->greeterMock);
        $output = $testedInstance();

        self::assertEquals($messageOutput, $output);
    }
}
