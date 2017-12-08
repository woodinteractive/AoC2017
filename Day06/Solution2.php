<?php

// $input = "0 2 7 0";
$input = "4	10	4	1	8	4	9	14	5	1	14	15	0	15	3	5";
$banks = preg_split("/\s/", $input);
$length = count($banks);
$match = [];
$cycles = null;

do {
    if ($cycles) {
        $match[] = $cycles;
    }
    $value = max($banks);
    $index = array_keys($banks, $value)[0];

    $banks[$index] = 0;
    while ($value > 0) {
        $index++;
        if ($index == $length) {
            $index = 0;
        }
        $banks[$index]++;
        $value--;
    }

    $cycles = implode(',', $banks);
} while (!in_array($cycles, $match));

echo count($results) - array_search($check, $results);
