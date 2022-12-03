<?php

$input = file('input1.txt');
$elfCounter = 0;
$elf = [];
$elf[0] = 0;
foreach ($input as $line) {
    $line = str_replace("\n", '', trim($line));
    if ($line === '') {
        $elfCounter++;
        $elf[$elfCounter] = 0;
    }
    $elf[$elfCounter] += (int) $line;
}
echo max($elf);
