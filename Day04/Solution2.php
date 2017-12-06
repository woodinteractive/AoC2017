<?php

require 'input.php';

function countValidPassphrases($input)
{
    $phrases = explode("\n", $input);
    $total = 0;

    foreach ($phrases as $phrase) {
        $words = preg_split("/\s/", $phrase); // array of words

        foreach ($words as $key => $word) {
            $letters = str_split($word);
            sort($letters);
            $newWord = implode('', $letters);
            $words[$key] = $newWord;
        }

        $uniqueWords = array_unique($words);
        
        $diff = count($words) - count($uniqueWords);

        if ($diff < 1) {
            $total++;
        }
    }
    return $total;
}

echo countValidPassphrases($input);
