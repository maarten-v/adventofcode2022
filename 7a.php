<?php
$input = file('input7.txt');
$structure = [];
$dir = $structure;
/** @var string $line */
foreach ($input as $line) {
    if ($line === '$ ls') {
        continue;
    }
    if (str_starts_with('$ cd', $line)) {
        $dir['sr'] = [];
        $dir = $dir['sr'];
    }
    if (is_numeric($line[0])) {
        preg_match("/\d+/", $line, $size);
        $dir[] = $size;
    }
}
