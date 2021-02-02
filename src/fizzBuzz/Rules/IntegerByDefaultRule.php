<?php

namespace vdebes\phpdojo\fizzBuzz\Rules;

use vdebes\phpdojo\fizzBuzz\Rule;

class IntegerByDefaultRule implements Rule
{

    public function transform(int $number, string $output): string
    {
        if (empty($output) === false) {
            return $output;
        }

        return (string) $number;
    }
}
