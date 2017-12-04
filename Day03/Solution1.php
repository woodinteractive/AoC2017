<?php

$goal = 368078;
$steps = 0;
$diff = 0;
$corner = 1;

if ($goal > 1) {
    while ($goal > $corner) {
        // Find steps out from center
        $steps++;
        $corner = $steps*8 + $corner;
    }

    $max = ($steps*2)*4;

    $quot = floor(($corner-$goal)/$steps);

    $diff = ($corner-$goal)%$steps;
}

if ($quot%2==0) {
    echo $steps+($steps-$diff);
} else {
    echo $steps+$diff;
}
