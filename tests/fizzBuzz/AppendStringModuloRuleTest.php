<?php

namespace phpdojo\tests\fizzBuzz;

use PHPUnit\Framework\TestCase;
use vdebes\phpdojo\fizzBuzz\Rules\AppendStringModuloRule;

class AppendStringModuloRuleTest extends TestCase
{
    /**
     * @dataProvider getEvenRange
     */
    public function test rule transforms on modulo(int $int): void
    {
        $rule = new AppendStringModuloRule(2, 'Fuzz');

        self::assertSame('Fuzz', $rule->transform($int, ''));
    }

    /**
     * @dataProvider getEvenRange
     */
    public function test rule does not transform on nomodulo(int $int): void
    {
        $rule = new AppendStringModuloRule(2, 'Fuzz');

        self::assertSame('', $rule->transform($int + 1, ''));
    }

    /**
     * @return \Generator<string,array<int>>
     */
    public function getEvenRange(): \Generator
    {
        foreach (range(0, 100, 2) as $int) {
            yield 'int ' . $int => [$int];
        }
    }

    public function test rule appends on modulo(): void
    {
        $rule = new AppendStringModuloRule(2, 'Fuzz');

        self::assertSame('testFuzz', $rule->transform(2, 'test'));
    }

    public function test rule does not append on nomodulo(): void
    {
        $rule = new AppendStringModuloRule(2, 'Fuzz');

        self::assertSame('test', $rule->transform(1, 'test'));
    }
}
