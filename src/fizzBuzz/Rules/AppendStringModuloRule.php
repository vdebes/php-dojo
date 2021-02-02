<?php

namespace vdebes\phpdojo\fizzBuzz\Rules;

use vdebes\phpdojo\fizzBuzz\Rule;

class AppendStringModuloRule implements Rule
{

    private int $modulo;

    private string $append;

    public function __construct(int $modulo, string $append)
    {
        $this->modulo = $modulo;
        $this->append = $append;
    }

    public function transform(int $number, string $output): string
    {
        if ($number % $this->modulo === 0) {
            $output .= $this->append;
        }

        return $output;
    }
}
