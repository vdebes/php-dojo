<?php

namespace phpdojo\tests\fizzBuzz;

use PHPUnit\Framework\TestCase;
use vdebes\phpdojo\fizzBuzz\FizzBuzzer;

class FizzBuzzerTest extends TestCase
{

    /**
     * @var array|int[]
     */
    private array $testIndexesForThree = [3,6,9,12,18,21,24,27];

    /**
     * @var array|int[]
     */
    private array $testIndexesForFive = [5,10,20,25];

    /**
     * @var array|int[]
     */
    private array $testIndexesForThreeAndFive = [15, 30];

    /**
     * @testdox class is instanciable
     */
    public function testIsInstanciable(): void
    {
        $testedInstance = new FizzBuzzer();
        self::assertIsObject($testedInstance);
    }

    /**
     * @testdox class is invokable
     */
    public function testIsInvokable(): void
    {
        $testedInstance = new FizzBuzzer();
        $testedInstance();

        self::assertTrue(true);
    }

    /**
     * @testdox class outputs string
     */
    public function testOutputsString(): void
    {
        $testedInstance = new FizzBuzzer();
        self::assertIsString($testedInstance());
    }

    /**
     * @testdox class outputs 100 strings separated by a new line character
     */
    public function testOutputs100Strings(): void
    {
        $testedInstance = new FizzBuzzer();
        $output         = $testedInstance();
        self::assertIsString($output);
        self::assertCount(100, explode(PHP_EOL, $output));
    }

    /**
     * @testdox class outputs numeric strings or Fizz instead of multiples of 3
     */
    public function testOutputsNumericStringsOrFizz(): void
    {
        $testedInstance = new FizzBuzzer();
        $output         = $testedInstance();
        $stringAsArray  = explode(PHP_EOL, $output);
        foreach ($stringAsArray as $index => $value) {
            if (++$index > end($this->testIndexesForThree)) {
                break;
            }

            if (in_array($index, $this->testIndexesForThree)) {
                self::assertEquals('Fizz', $value);
                continue;
            }

            if (!in_array($index, $this->testIndexesForFive) && !in_array($index, $this->testIndexesForThreeAndFive)) {
                self::assertIsNumeric($value);
            }
        }
    }

    /**
     * @testdox class outputs numeric strings or Buzz instead of multiples of 5
     */
    public function testOutputsNumericStringsOrBuzz(): void
    {
        $testedInstance = new FizzBuzzer();
        $output         = $testedInstance();
        $stringAsArray  = explode(PHP_EOL, $output);
        foreach ($stringAsArray as $index => $value) {
            if (++$index > end($this->testIndexesForFive)) {
                break;
            }

            if (in_array($index, $this->testIndexesForFive)) {
                self::assertEquals('Buzz', $value);
                continue;
            }

            if (!in_array($index, $this->testIndexesForThree) && !in_array($index, $this->testIndexesForThreeAndFive)) {
                self::assertIsNumeric($value);
            }
        }
    }

    /**
     * @testdox class outputs numeric strings or FizzBuzz instead of multiples of 3 and 5
     */
    public function testOutputsNumericStringsOrFizzBuzz(): void
    {
        $testedInstance = new FizzBuzzer();
        $output         = $testedInstance();
        $stringAsArray  = explode(PHP_EOL, $output);
        foreach ($stringAsArray as $index => $value) {
            if (++$index > end($this->testIndexesForThreeAndFive)) {
                break;
            }

            if (in_array($index, $this->testIndexesForThreeAndFive)) {
                self::assertEquals('FizzBuzz', $value);
                continue;
            }

            if (!in_array($index, array_merge($this->testIndexesForThree, $this->testIndexesForFive, $this->testIndexesForThreeAndFive))) {
                self::assertIsNumeric($value);
            }
        }
    }
}
