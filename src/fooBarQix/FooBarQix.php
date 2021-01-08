<?php

namespace vdebes\phpdojo\fooBarQix;

class FooBarQix
{
    private const REPLACE = [
        "3" => "Foo",
        "5" => "Bar",
    ];

    public function compute(string $input): string
    {
        $ouput = '';
        foreach (self::REPLACE as $key => $element) {

            if (strpos($input, (string) $key) !== false) {
                $ouput .= $element;
            }

            if ($input % (int) $key === 0) {
                $ouput .= $element;
            }
        }

        return empty($ouput) ? $input : $ouput;
    }
}
