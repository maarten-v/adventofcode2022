<?php

/** @var string[] $input */
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
$total = 0;
for ($i = 0; $i < 3; $i++) {
    $total += max($elf);
    unset($elf[array_search(max($elf), $elf)]);
}
echo $total;
