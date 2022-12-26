<?php

/** @var string[] $input */
$input = file('input8.txt');
$trees = [];
$rowCount = count($input);
$colCount = strlen($input[0]) - 1;
for ($i = 0; $i < $rowCount; $i++) {
    $trees[$i] = str_split(str_replace("\n", '', $input[$i]));
}
$allScores = [];

for ($globalrow = 0; $globalrow < $rowCount; $globalrow++) {
    for ($globalcol = 0; $globalcol < $colCount; $globalcol++) {
        $height = $trees[$globalrow][$globalcol];

        // left to right
        $visibleTreesCounter = 0;
        for ($col = $globalcol; $col < $colCount - 1; $col++) {
            $visibleTreesCounter++;
            if ($trees[$globalrow][$col + 1] >= $height) {
                break;
            }
        }
        $leftToRight = $visibleTreesCounter;

        // right to left
        $visibleTreesCounter = 0;
        for ($col = $globalcol; $col > 0; $col--) {
            $visibleTreesCounter++;
            if ($trees[$globalrow][$col -1] >= $height) {
                break;
            }
        }
        $rightToLeft = $visibleTreesCounter;

        // top to bottom
        $visibleTreesCounter = 0;
        for ($row = $globalrow; $row < $rowCount - 1; $row++) {
            $visibleTreesCounter++;
            if ($trees[$row + 1][$globalcol] >= $height) {
                break;
            }
        }
        $topToBottom = $visibleTreesCounter;

        // bottom to top
        $visibleTreesCounter = 0;
        for ($row = $globalrow; $row > 0; $row--) {
            $visibleTreesCounter++;
            if ($trees[$row - 1][$globalcol] >= $height) {
                break;
            }
        }
        $bottomToTop = $visibleTreesCounter;

        $allScores[] = $leftToRight * $rightToLeft * $topToBottom * $bottomToTop;
    }
}

echo max($allScores);
