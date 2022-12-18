<?php

/** @var string[] $input */
$input = file('input8.txt');
$trees = [];
$rowCount = count($input);
$colCount = strlen($input[0]);
for ($i = 0; $i < $rowCount; $i++) {
    $trees[$i] = str_split(str_replace("\n", '', $input[$i]));
}
$heights = [];

// left to right
for ($row = 0; $row <$rowCount; $row++) {
    $previousMaxHeight = -1;
    for ($col = 0; $col <$rowCount; $col++) {
        if ($trees[$row][$col] > $previousMaxHeight) {
            $previousMaxHeight = $trees[$row][$col];
            $heights[$row][$col] = 1;
        }
    }
}

// right to left
for ($row = 0; $row <$rowCount; $row++) {
    $previousMaxHeight = -1;
    for ($col = $rowCount - 1; $col >= 0; $col--) {
        if ($trees[$row][$col] > $previousMaxHeight) {
            $previousMaxHeight = $trees[$row][$col];
            $heights[$row][$col] = 1;
        }
    }
}

// top to bottom
for ($col = 0; $col < $colCount - 1; $col++) {
    $previousMaxHeight = -1;
    for ($row = 0; $row < $rowCount; $row++) {
        if ($trees[$col][$row] > $previousMaxHeight) {
            $previousMaxHeight = $trees[$col][$row];
            $heights[$row][$col] = 1;
        }
    }
}

//bottom to top
for ($col = 0; $col < $colCount - 1; $col++) {
    $previousMaxHeight = -1;
    for ($row = $rowCount - 1; $row >= 0; $row--) {
        if ($trees[$col][$row] > $previousMaxHeight) {
            $previousMaxHeight = $trees[$col][$row];
            $heights[$row][$col] = 1;
        }
    }
}

$sum = 0;
foreach ($heights as $row) {
    $sum += array_sum($row);
}
echo $sum;
