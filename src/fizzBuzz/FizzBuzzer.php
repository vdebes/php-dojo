<?php

namespace vdebes\phpdojo\fizzBuzz;

class FizzBuzzer
{
    public function __invoke(): string
    {
        $output = null;

        for ($i = 1; $i <= 100; $i++) {
            $isDivisibleBy3 = $i % 3 === 0;
            $isDivisibleBy5 = $i % 5 === 0;

            if ($isDivisibleBy3) {
                $output .= 'Fizz';
            }

            if ($isDivisibleBy5) {
                $output .= 'Buzz';
            }

            if (!$isDivisibleBy3 && !$isDivisibleBy5) {
                $output .= (string) $i;
            }

            if ($i !== 100) {
                $output .= PHP_EOL;
            }
        }

        return $output;
    }
}
