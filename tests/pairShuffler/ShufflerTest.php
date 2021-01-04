<?php

namespace phpdojo\tests\pairShuffler;

use PHPUnit\Framework\TestCase;
use vdebes\phpdojo\pairShuffler\Shuffler;

class ShufflerTest extends TestCase
{
    /**
     * @dataProvider participantsDataProvider
     */
    public function testSplitsParticipantsInDuoOrTrio(array $participants, int $expectedGroupsCount): void
    {
        $testedInstance = new Shuffler();
        self::assertIsObject($testedInstance);
        self::assertIsArray($output = $testedInstance($participants));
        self::assertCount($expectedGroupsCount, $output);
    }

    /**
     * @dataProvider participantsDataProvider
     */
    public function testOutputContainsAllParticpants(array $participants): void
    {
        $testedInstance = new Shuffler();

        $output = $testedInstance($participants);

        $flatOutput = array_merge(...$output);
        self::assertEmpty(array_diff($participants, $flatOutput));
    }

    /**
     * @dataProvider participantsDataProvider
     */
    public function testOutputOrderDiffersFromInputs(array $participants): void
    {
        $testedInstance = new Shuffler();

        $output = $testedInstance($participants);

        $flatOutput = array_merge(...$output);
        self::assertNotEquals($participants, $flatOutput);
    }

    public function participantsDataProvider(): array
    {
        return [
            'Riri' => [['Riri'], 1],
            'Riri,Fifi' => [['Riri','Fifi'], 1],
            'Riri,Fifi,Loulou' => [['Riri','Fifi','Loulou'], 1],
            'Riri,Fifi,Loulou,Donald' => [['Riri','Fifi','Loulou','Donald'], 2],
            'Riri,Fifi,Loulou,Donald,Picsou' => [['Riri','Fifi','Loulou','Donald','Picsou'], 2],
        ];
    }
}
