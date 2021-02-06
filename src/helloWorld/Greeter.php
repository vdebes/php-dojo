<?php

namespace vdebes\phpdojo\helloWorld;

class Greeter implements Greet
{
    public function __invoke(): string
    {
        return 'Hello, World!';
    }
}
