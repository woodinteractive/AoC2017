<?php

$input = "4	10	4	1	8	4	9	14	5	1	14	15	0	15	3	5";

$banks = preg_split("/\s/", $input);

$cycles = [
    $banks
];

$cycleCount = 0;

function findLargestBank($banks)
{
    $largestValue = max($banks);
    $key = array_search($largestValue, $banks);
    return $key;
}

function redistribute($banks)
{
    $key = findLargestBank($banks);
    $value = $banks[$key];
    $banks[$key] = 0;
    $length = count($banks);

    for ($i=$key+1; $value > 0; $i++) {
        if ($i < $length) {
            $banks[$i]++;
            $value--;
        } else {
            $i = 0;
            $banks[$i]++;
            $value--;
        }
    }
    return $banks;
}


function compareToPrevious($cycles)
{
    foreach ($cycles as $key => $cycle) {
        $cycles[$key] = implode('', $cycle);
    }
    $unique = array_unique($cycles);
    return count($cycles) - count($unique);
}


// $banks = redistribute($banks);
// array_push($cycles, $banks);
// $banks = redistribute($banks);
// array_push($cycles, $banks);
// $banks = redistribute($banks);
// array_push($cycles, $banks);

// arsort($cycles[2]);
// $largestValue = current($cycles[2]);

// $largestValue = max($cycles[2]);
// print_r($cycles[2]);
// print_r(array_search($largestValue, $cycles[2]));

// echo findLargestBank($cycles[2]);
// print_r($cycles);

$diff = 0;

while ($diff < 1) {
    $banks = redistribute($banks);
    array_push($cycles, $banks);
    $diff = compareToPrevious($cycles);
    $cycleCount++;
}
    
// print_r($cycles[3]);


echo $cycleCount;
