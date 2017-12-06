<?php

require 'input.php';
$input = explode("\n", $input);
$stepCounter = 0;
$position = 0; // array key

$length = count($input);

while ($position < $length) {
    $lastPosition = $position;
    $instruction = $input[$position];
    $position = $position + $instruction;
    $input[$lastPosition]++;
    $stepCounter++;
}

echo $stepCounter;
