<?php
$input = file('input7.txt');
$structure = [];
/** @var string $line */
foreach ($input as $lineNumber => $line) {
    $line = str_replace("\n", '', $line);
    if ($line === '$ cd /') {
        readFolder($lineNumber + 1, '/');
    }

}

function readFolder($startLine, $folder) {
    global $structure, $input;
    $tweedekeer = false;
    for ($i = $startLine; $i < count($input); $i++) {
        if ($i === 1) {
            if ($tweedekeer) {
                break;
            }
            $tweedekeer = true;
        }
        echo $i.'-';
        $line = str_replace("\n", '', $input[$i]);
        if ($line === '$ cd ..') {
            echo 'x' . $i . 'x';
            return $i;
        }
        if (str_starts_with($line, '$ cd ')) {
            echo 'zit in cd';
            $i = readFolder($i + 1, $folder[substr($line, 5)]);
        }
        if (is_numeric($line[0])) {
            preg_match("/\d+/", $line, $size);
            $structure[$folder][] = $size;
        }
    }
}

var_dump($structure);