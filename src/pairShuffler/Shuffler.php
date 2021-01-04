<?php

namespace vdebes\phpdojo\pairShuffler;

class Shuffler
{
    /**
     * @param array<string> $list
     * @return array<array>
     */
    public function __invoke(array $list): array
    {
        shuffle($list);
        $listSize  = count($list);
        $isOddList = $listSize % 2 !== 0;
        $list      = array_chunk($list, 2);

        if ($isOddList && $listSize > 1) {
            $orphan           = array_pop($list);
            $lastIndex        = count($list) - 1;
            $list[$lastIndex] = array_merge($list[$lastIndex], $orphan);
        }

        return $list;
    }
}
