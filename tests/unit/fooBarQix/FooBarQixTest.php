<?php

namespace phpdojo\tests\unit\fooBarQix;

use PHPUnit\Framework\TestCase;
use vdebes\phpdojo\fooBarQix\FooBarQix;

class FooBarQixTest extends TestCase
{
    /** @dataProvider inputDataProvider */
    public function testFooBarQix($input, $expected): void
    {
        $testedInstance = new FooBarQix();

        self::assertIsObject($testedInstance);
        self::assertTrue(method_exists($testedInstance, 'compute'));

        self::assertIsString($output = $testedInstance->compute($input));
        self::assertEquals($expected, $output);
    }

    public function inputDataProvider()
    {
        return [
            ["1","1"],
            ["2","2"],
            ["3","FooFoo"],
            ["4","4"],
            ["5","BarBar"],
            ["6","Foo"],
            ["9","Foo"],
            ["13","Foo"],
        ];
    }
}
