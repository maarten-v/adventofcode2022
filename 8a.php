<?php

/** @var string[] $input */
$input = file('input8.txt');
$trees = [];
$rowCount = count($input);
$colCount = strlen($input[0]);
for ($i = 0; $i < $rowCount; $i++) {
    $trees[$i] = str_split(str_replace("\n", '', $input[$i]));
}
$visibleTrees = [];

// left to right
for ($row = 0; $row <$rowCount; $row++) {
    $previousMaxHeight = -1;
    for ($col = 0; $col <$rowCount; $col++) {
        $previousMaxHeight = setVisible($previousMaxHeight, $row, $col);
    }
}

// right to left
for ($row = 0; $row <$rowCount; $row++) {
    $previousMaxHeight = -1;
    for ($col = $rowCount - 1; $col >= 0; $col--) {
        $previousMaxHeight = setVisible($previousMaxHeight, $row, $col);
    }
}

// top to bottom
for ($col = 0; $col < $colCount - 1; $col++) {
    $previousMaxHeight = -1;
    for ($row = 0; $row < $rowCount; $row++) {
        $previousMaxHeight = setVisible($previousMaxHeight, $row, $col);
    }
}

//bottom to top
for ($col = 0; $col < $colCount - 1; $col++) {
    $previousMaxHeight = -1;
    for ($row = $rowCount - 1; $row >= 0; $row--) {
        $previousMaxHeight = setVisible($previousMaxHeight, $row, $col);
    }
}

function setVisible(int $previousMaxHeight, int $row, int $col): int {
    global $trees, $visibleTrees;
    if ($trees[$row][$col] > $previousMaxHeight) {
        $previousMaxHeight = $trees[$row][$col];
        $visibleTrees[$row][$col] = 1;
    }
    return $previousMaxHeight;
}

$sum = 0;
foreach ($visibleTrees as $row) {
    $sum += array_sum($row);
}
echo $sum;
