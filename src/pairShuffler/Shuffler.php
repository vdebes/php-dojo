<?php

namespace vdebes\phpdojo\pairShuffler;

class Shuffler
{
    public function shuffle(array $list): array
    {
        $listSize = count($list);
        $isOddList = $listSize % 2 !== 0;
        $list = array_chunk($list, 2);

        if ($isOddList && $listSize > 1) {
            $orphan = array_pop($list);
            $lastIndex = count($list) - 1;
            $list[$lastIndex] = array_merge($list[$lastIndex], $orphan);
        }

        return $list;
    }
}
