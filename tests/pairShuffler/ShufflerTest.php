<?php

namespace phpdojo\tests\pairShuffler;

use PHPUnit\Framework\TestCase;
use vdebes\phpdojo\pairShuffler\Shuffler;

class ShufflerTest extends TestCase
{
    /**
     * @dataProvider participantsDataProvider
     */
    public function testShuffler(array $participants, int $expectedGroupsCount): void
    {
        $testedInstance = new Shuffler();
        self::assertIsObject($testedInstance);
        self::assertTrue(method_exists($testedInstance, 'shuffle'));

        self::assertIsArray($output = $testedInstance->shuffle($participants));
        self::assertCount($expectedGroupsCount, $output);
    }

    public function participantsDataProvider(): array
    {
        return [
            [['Riri'], 1],
            [['Riri','Fifi'], 1],
        ];
    }
}
