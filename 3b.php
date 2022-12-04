<?php

$input = file('input3.txt');
$priorities = range('a', 'z');
$priorities = array_merge($priorities , range('A', 'Z'));
$total = 0;
$nrOfLines = count($input);
for ($i = 0; $i < $nrOfLines; $i += 3) {
    $rugsack = str_replace("\n", '', trim($input[$i]));
    foreach (str_split($rugsack) as $item) {
        if (str_contains($input[$i +1], $item) && str_contains($input[$i +2], $item)) {
            $total += array_search($item, $priorities, true) + 1;
            break;
        }
    }
}
echo $total;
