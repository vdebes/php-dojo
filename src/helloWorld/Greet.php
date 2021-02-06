<?php

namespace vdebes\phpdojo\helloWorld;

interface Greet
{
    public function __invoke(): string;
}
