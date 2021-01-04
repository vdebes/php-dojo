<?php

namespace phpdojo\tests\pairShuffler;

use PHPUnit\Framework\TestCase;
use vdebes\phpdojo\pairShuffler\Shuffler;

class ShufflerTest extends TestCase
{
    /**
     * @dataProvider participantsDataProvider
     */
    public function testShuffler(array $participants, int $expectedGroups): void
    {
        $testedInstance = new Shuffler();
        self::assertIsObject($testedInstance);
        self::assertTrue(method_exists($testedInstance, 'shuffle'));

        self::assertIsArray($output = $testedInstance->shuffle($participants));
        self::assertCount(count($participants), $output);
    }

    public function participantsDataProvider(): array
    {
        return [
            [['Riri'], 1],
        ];
    }
}
