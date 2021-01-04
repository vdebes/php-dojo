<?php

/**
 * Usage : php shuffle.php Riri,Fifi,Loulou,Donald,Picsou
 */

use vdebes\phpdojo\pairShuffler\Shuffler;

include __DIR__ . '/vendor/autoload.php';

$participants = explode(',', $argv[1]);
$shuffler = new Shuffler();

$shuffledGroups = $shuffler($participants);

foreach ($shuffledGroups as $group) {
    echo implode(',', $group) . ' work together.' . PHP_EOL;
}
