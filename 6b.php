<?php

/** @var string $input */
$input = file('input6.txt')[0];
$length = strlen($input);
for ($i = 0; $i < ($length - 14); $i++) {
    $marker = substr($input, $i, 14);
    $markerAsArray = str_split($marker);
    if ($markerAsArray === array_unique($markerAsArray)) {
        echo ($i + 14);
        break;
    }
}
