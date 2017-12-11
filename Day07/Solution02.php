<?php

// require 'input.php';
$input = "pbga (66)
xhth (57)
ebii (61)
havc (66)
ktlj (57)
fwft (72) -> ktlj, cntj, xhth
qoyq (66)
padx (45) -> pbga, havc, qoyq
tknk (41) -> ugml, padx, fwft
jptl (61)
ugml (68) -> gyxo, ebii, jptl
gyxo (61)
cntj (57)";



preg_match_all("/([a-z])\w+/", $input, $results);
$results = array_count_values($results[0]);
asort($results);
$bottomProgram = key($results); // Bottom program

$input = preg_replace("/->.+/", "", $input);
$input = str_replace(["(", ")"], "", $input);
$programs = explode("\n", $input);
$length = count($programs);

for ($i=0; $i < count($programs); $i++) {
    $programs[$i] = explode(" ", $programs[$i]);
}

$newarray = [];

for ($i=0; $i < $length; $i++) {
    $name = $programs[$i]
    $newarray[$name ] = $programs[$i+1];
}

// $input = str_replace([" ", "(", ")"], ["", "->", ""], $input);
// for ($i=0; $i < count($programs); $i++) {
//     $programs[$i] = explode("->", $programs[$i]);
//     if (array_key_exists(2, $programs[$i])) {
//         $programs[$i][2] = explode(",", $programs[$i][2]);
//     }
// }

// print_r($programs);
