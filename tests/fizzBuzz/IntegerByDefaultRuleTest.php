<?php

namespace phpdojo\tests\fizzBuzz;

use PHPUnit\Framework\TestCase;
use vdebes\phpdojo\fizzBuzz\Rules\IntegerByDefaultRule;

class IntegerByDefaultRuleTest extends TestCase
{
    /**
     * @dataProvider getIntegerRange
     */
    public function test rule cast given integer(int $int): void
    {
        $initialOutput = '';

        $rule = new IntegerByDefaultRule();

        self::assertSame((string) $int, $rule->transform($int, $initialOutput));
    }

    /**
     * @dataProvider getIntegerRange
     */
    public function test rule is not applied(int $int): void
    {
        $initialOutput = 'test';

        $rule = new IntegerByDefaultRule();

        self::assertSame($initialOutput, $rule->transform($int, $initialOutput));
    }

    /**
     * @return \Generator<string,array<int>>
     */
    public function getIntegerRange(): \Generator
    {
        foreach (range(1, 100, 1) as $int) {
            yield "int $int" => [$int];
        }
    }
}
