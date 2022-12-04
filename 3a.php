<?php

$input = file('input3.txt');
$priorities = range('a', 'z');
$priorities = array_merge($priorities , range('A', 'Z'));
$total = 0;
foreach ($input as $line) {
    $items = str_replace("\n", '', trim($line));
    $rugsack1 = substr($items, 0, strlen($items)/2);
    $rugsack2 = substr($items, strlen($items)/2);
    foreach (str_split($rugsack1) as $item) {
        if (str_contains($rugsack2, $item)) {
            $total += array_search($item, $priorities, true) + 1;
            break;
        }
    }
}
echo $total;
