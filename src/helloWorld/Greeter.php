<?php

namespace vdebes\phpdojo\helloWorld;

class Greeter
{
    public function __invoke(): string
    {
        return 'Hello, World!';
    }
}
