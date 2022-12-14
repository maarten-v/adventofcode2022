<?php

/** @var string[] $input */
$input = file('input5.txt');
$stacks = [];
$cratesAreParsed = false;
$lineCounter = 0;
foreach ($input as $line) {
    $line = str_replace("\n", '', $line);
    $length = strlen($line);

    for ($i = 1; $i < $length && !$cratesAreParsed; $i += 4) {
        $crate = $line[$i];
        $stack = ($i - 1) / 4;
        if ($crate === '1') {
            $cratesAreParsed = true;
            break 2;
        }
        if (!isset($stacks[$stack])) {
            $stacks[$stack] = [];
        }
        if ($crate !== ' ') {
            array_unshift($stacks[$stack], $crate);
        }
    }
    $lineCounter++;
}
$lineAmount = count($input);
for ($i = $lineCounter + 2; $i < $lineAmount; $i++) {
    preg_match_all("/\d+/", $input[$i], $matches);
    [$amount, $from, $to] = $matches[0];
    for ($j = 0; $j < $amount; $j++) {
        $stacks[$to - 1][] = array_pop($stacks[$from - 1]);
    }
}
$result = '';
foreach ($stacks as $stack) {
    $result .= end($stack);
}
echo $result;