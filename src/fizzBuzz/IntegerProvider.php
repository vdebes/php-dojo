<?php

namespace vdebes\phpdojo\fizzBuzz;

interface IntegerProvider
{
    /**
     * @return int[]
     */
    public function list(): array;
}
