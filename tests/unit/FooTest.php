<?php

namespace phpdojo\tests\unit;

use PHPUnit\Framework\TestCase;
use vdebes\phpdojo\Foo;

class FooTest extends TestCase
{
    public function testFoo(): void
    {
        $testedInstance = new Foo();
        $this->assertEquals('Bar', $testedInstance());
    }
}
