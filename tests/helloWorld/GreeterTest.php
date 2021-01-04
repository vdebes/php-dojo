<?php

namespace phpdojo\tests\helloWorld;

use PHPUnit\Framework\TestCase;

class GreeterTest extends TestCase
{
    public function testIsInstantiable(): void
    {
        $testedInstance = new Greeter();
        self::assertIsObject($testedInstance);
    }
}
