<?php

namespace vdebes\phpdojo\fizzBuzz;

class FizzBuzzer
{

    private IntegerProvider $integerProvider;

    /**
     * @var Rule[]
     */
    private array $rules;

    public function __construct(IntegerProvider $integerProvider, Rule ...$rules)
    {
        $this->integerProvider = $integerProvider;
        $this->rules           = $rules;
    }

    /**
     * @return string[]
     */
    public function __invoke(): array
    {
        return array_map(
            [$this, 'transform'],
            $this->integerProvider->list()
        );
    }

    private function transform(int $integer): string
    {
        $output = '';

        foreach ($this->rules as $rule) {
            $output = $rule->transform($integer, $output);
        }

        return $output;
    }
}
