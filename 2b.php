<?php

$input = file('input2.txt');
$score = 0;
$mapping['A']['X'] = 0 + 3;
$mapping['A']['Y'] = 3 + 1;
$mapping['A']['Z'] = 6 + 2;
$mapping['B']['X'] = 0 + 1;
$mapping['B']['Y'] = 3 + 2;
$mapping['B']['Z'] = 6 + 3;
$mapping['C']['X'] = 0 + 2;
$mapping['C']['Y'] = 3 + 3;
$mapping['C']['Z'] = 6 + 1;
foreach ($input as $line) {
    $line = str_replace("\n", '', trim($line));
    $play = explode(' ', $line);
    [$opponent, $me] = $play;
    $score += $mapping[$opponent][$me];
}
echo $score;
