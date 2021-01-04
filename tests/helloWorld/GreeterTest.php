<?php

namespace phpdojo\tests\helloWorld;

use PHPUnit\Framework\TestCase;
use vdebes\phpdojo\helloWorld\Greeter;

class GreeterTest extends TestCase
{
    public function testIsInstantiable(): void
    {
        $testedInstance = new Greeter();
        self::assertIsObject($testedInstance);
    }
}
