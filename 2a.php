<?php

$input = file('input2.txt');
$score = 0;
/** @var string[] $input */
foreach ($input as $line) {
    $line = str_replace("\n", '', trim($line));
    /** @var string[] $play */
    $play = explode(' ', $line);
    [$opponent, $me] = $play;
    if (
        ($opponent === 'A' && $me === 'Y') ||
        ($opponent === 'B' && $me === 'Z') ||
        ($opponent === 'C' && $me === 'X' )
    ) {
        $score += 6;
    } elseif (
        ($opponent === 'A' && $me === 'X') ||
        ($opponent === 'B' && $me === 'Y') ||
        ($opponent === 'C' && $me === 'Z' )
    ) {
        $score += 3;
    }
    if ($me === 'X') {
        ++$score;
    } elseif ($me === 'Y') {
        $score += 2;
    } elseif ($me === 'Z') {
        $score += 3;
    }
}
echo $score;
