<?php

$input = file('input5.txt');
$crates = [];
$cratesAreParsed = false;
$lineCounter = 0;
foreach ($input as $line) {
    $line = str_replace("\n", '', $line);
    $length = strlen($line);

    for ($i = 1; $i < $length && !$cratesAreParsed; $i += 4) {
        $crate = $line[$i];
        $crateArray[$i - 1]
        if ($crate === '1') {
//            var_dump()
            $cratesAreParsed = true;
            break;
        }
        echo $crate . '-';
    }
    $lineCounter++;

}
