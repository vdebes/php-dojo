<?php

namespace phpdojo\tests\fizzBuzz;

use vdebes\phpdojo\fizzBuzz\IntegerProvider;

class RangeProvider implements IntegerProvider
{

    private int $min;

    private int $max;

    private int $step;

    public function __construct(int $min, int $max, int $step)
    {
        $this->min  = $min;
        $this->max  = $max;
        $this->step = $step;
    }

    public function list(): array
    {
        return range($this->min, $this->max, $this->step);
    }
}
