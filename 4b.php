<?php

/** @var string[] $input */
$input = file('input4.txt');
$total = 0;
foreach ($input as $line) {
    $sections = explode(',', str_replace("\n", '', trim($line)));
    [$min1, $max1] = explode('-', $sections[0]);
    [$min2, $max2] = explode('-', $sections[1]);
    if (($min2 >= $min1 && $min2 <= $max1) || ($min1 >= $min2 && $min1 <= $max2)) {
        $total++;
    }
}
echo $total;
