<?php

namespace phpdojo\tests\fizzBuzz;

use PHPUnit\Framework\TestCase;
use vdebes\phpdojo\fizzBuzz\FizzBuzzer;
use vdebes\phpdojo\fizzBuzz\Rule;
use vdebes\phpdojo\fizzBuzz\Rules\AppendStringModuloRule;
use vdebes\phpdojo\fizzBuzz\Rules\IntegerByDefaultRule;

class FizzBuzzerTest extends TestCase
{
    public function test returns one string for each integer provided(): void
    {
        $fizzBuzzer = new FizzBuzzer(
            new RangeProvider(1, 10, 1),
            new class () implements Rule
            {
                public function transform(int $number, string $output): string
                {
                    return 'Test';
                }
            },
        );

        $this->assertSame(
            [
                'Test',
                'Test',
                'Test',
                'Test',
                'Test',
                'Test',
                'Test',
                'Test',
                'Test',
                'Test',
            ],
            $fizzBuzzer()
        );
    }

    public function test rules are applied in order(): void
    {
        $fizzBuzzer = new FizzBuzzer(
            new RangeProvider(1, 10, 1),
            new class () implements Rule
            {
                public function transform(int $number, string $output): string
                {
                    return 'Hello';
                }
            },
            new class () implements Rule
            {
                public function transform(int $number, string $output): string
                {
                    return 'World';
                }
            },
        );

        $this->assertSame(
            [
                'World',
                'World',
                'World',
                'World',
                'World',
                'World',
                'World',
                'World',
                'World',
                'World',
            ],
            $fizzBuzzer()
        );
    }

    public function test rules are given previous output(): void
    {
        $fizzBuzzer = new FizzBuzzer(
            new RangeProvider(1, 10, 1),
            new class () implements Rule
            {
                public function transform(int $number, string $output): string
                {
                    return $output . 'Hello';
                }
            },
            new class () implements Rule
            {
                public function transform(int $number, string $output): string
                {
                    return $output . 'World';
                }
            },
        );

        $this->assertSame(
            [
                'HelloWorld',
                'HelloWorld',
                'HelloWorld',
                'HelloWorld',
                'HelloWorld',
                'HelloWorld',
                'HelloWorld',
                'HelloWorld',
                'HelloWorld',
                'HelloWorld',
            ],
            $fizzBuzzer()
        );
    }

    public function test integration(): void
    {
        $fizzBuzzer = new FizzBuzzer(
            new RangeProvider(1, 100, 1),
            new AppendStringModuloRule(3, 'Fizz'),
            new AppendStringModuloRule(5, 'Buzz'),
            new IntegerByDefaultRule(),
        );

        self::assertSame(
            [
                '1',
                '2',
                'Fizz',
                '4',
                'Buzz',
                'Fizz',
                '7',
                '8',
                'Fizz',
                'Buzz',
                '11',
                'Fizz',
                '13',
                '14',
                'FizzBuzz',
                '16',
                '17',
                'Fizz',
                '19',
                'Buzz',
                'Fizz',
                '22',
                '23',
                'Fizz',
                'Buzz',
                '26',
                'Fizz',
                '28',
                '29',
                'FizzBuzz',
                '31',
                '32',
                'Fizz',
                '34',
                'Buzz',
                'Fizz',
                '37',
                '38',
                'Fizz',
                'Buzz',
                '41',
                'Fizz',
                '43',
                '44',
                'FizzBuzz',
                '46',
                '47',
                'Fizz',
                '49',
                'Buzz',
                'Fizz',
                '52',
                '53',
                'Fizz',
                'Buzz',
                '56',
                'Fizz',
                '58',
                '59',
                'FizzBuzz',
                '61',
                '62',
                'Fizz',
                '64',
                'Buzz',
                'Fizz',
                '67',
                '68',
                'Fizz',
                'Buzz',
                '71',
                'Fizz',
                '73',
                '74',
                'FizzBuzz',
                '76',
                '77',
                'Fizz',
                '79',
                'Buzz',
                'Fizz',
                '82',
                '83',
                'Fizz',
                'Buzz',
                '86',
                'Fizz',
                '88',
                '89',
                'FizzBuzz',
                '91',
                '92',
                'Fizz',
                '94',
                'Buzz',
                'Fizz',
                '97',
                '98',
                'Fizz',
                'Buzz',
            ],
            $fizzBuzzer()
        );
    }
}
