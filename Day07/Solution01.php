<?php

require 'input.php';
// $input = "pbga (66)
// xhth (57)
// ebii (61)
// havc (66)
// ktlj (57)
// fwft (72) -> ktlj, cntj, xhth
// qoyq (66)
// padx (45) -> pbga, havc, qoyq
// tknk (41) -> ugml, padx, fwft
// jptl (61)
// ugml (68) -> gyxo, ebii, jptl
// gyxo (61)
// cntj (57)";


$programs = explode("\n", $input);
preg_match_all("/([a-z])\w+/", $input, $results);
$results = array_count_values($results[0]);

asort($results);
print_r(key($results));
