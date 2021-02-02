<?php

namespace vdebes\phpdojo\fizzBuzz;

interface Rule
{
    public function transform(int $number, string $output): string;
}
