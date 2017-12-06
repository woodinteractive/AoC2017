<?php

require 'input.php';

function countValidPassphrases($input)
{
    $input = explode("\n", $input);
    $total = 0;

    foreach ($input as $key => $value) {
        $phrase = preg_split("/\s/", $value);
        $unique = array_unique($phrase);
        $diff = count($phrase) - count($unique);
    
        if ($diff < 1) {
            $total++;
        }
    }
    return $total;
}

echo countValidPassphrases($input);
