<?php

namespace vdebes\phpdojo;

class Foo
{
    public function __invoke(): string
    {
        return 'Bar';
    }
}
