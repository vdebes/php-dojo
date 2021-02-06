<?php

namespace vdebes\phpdojo\helloWorld;

class FramedGreeter implements Greet
{
    private const CHARACTER = '*';
    private Greet $greeter;

    public function __construct(Greet $greeter)
    {
        $this->greeter = $greeter;
    }

    private static function surround(string $greeting): string
    {
        return self::CHARACTER.$greeting.self::CHARACTER;
    }

    public function __invoke(): string
    {
        $greeting = ($this->greeter)();
        $middle = self::surround($greeting);
        $top = self::getTopLine($middle);
        $bottom = self::getBottomLine($middle);

        return $top.$middle.$bottom;
    }

    private static function getTopLine(string $string): string
    {
        return self::getHorizontalLine($string).PHP_EOL;
    }

    private static function getBottomLine(string $string): string
    {
        return PHP_EOL.self::getHorizontalLine($string);
    }

    private static function getHorizontalLine(string $string): string
    {
        return str_repeat(self::CHARACTER, strlen($string));
    }
}
