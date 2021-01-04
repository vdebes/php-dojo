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
        self::assertIsArray($output = $testedInstance($participants));
        self::assertCount($expectedGroupsCount, $output);
    }

    public function participantsDataProvider(): array
    {
        return [
            [['Riri'], 1],
            [['Riri','Fifi'], 1],
            [['Riri','Fifi','Loulou'], 1],
            [['Riri','Fifi','Loulou','Donald'], 2],
            [['Riri','Fifi','Loulou','Donald','Picsou'], 2],
        ];
    }
}
