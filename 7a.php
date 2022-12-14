<?php

/** @var string[] $input */
$input = file('input7.txt');
$dirs = [];
$totals = [];
$dirCounter = 0;
foreach ($input as $line) {
    $line = str_replace("\n", '', $line);
    if ($line === '$ cd ..') {
        array_pop($dirs);
    } elseif (is_numeric($line[0])) {
        preg_match("/\d+/", $line, $size);
        foreach ($dirs as $dir) {
            if (!isset($totals[$dir])) {
                $totals[$dir] = 0;
            }
            $totals[$dir] += (int) $size[0];
        }
    } elseif (str_starts_with($line, '$ cd ')) {
        $dirs[] = $dirCounter++;
    }
}

$smallFoldersTotal = 0;
foreach ($totals as $total) {
    if ($total <= 100000) {
        $smallFoldersTotal += $total;
    }
}
echo $smallFoldersTotal;