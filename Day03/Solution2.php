<?php

$input = 368078;
$sequence = [ 'right', 'up', 'left', 'down'];
$stepIterator = 0;

$grid = [
    0 => [ // start
        'x' => 0,
        'y' => 0,
        'n' => 1
    ]
];

function right(&$x, &$y)
{
    $x++;
}

function up(&$x, &$y)
{
    $y++;
}

function left(&$x, &$y)
{
    $x--;
}

function down(&$x, &$y)
{
    $y--;
}

function isEmptySquare($grid, $x, $y)
{
    $filteredArray = array_filter($grid, function ($square) use ($x, $y) {
        return $square['x'] === $x && $square['y'] === $y;
    });
    if (count($filteredArray) > 0) {
        return false;
    } else {
        return true;
    }
}

function nextStep()
{
    global $stepIterator;

    if ($stepIterator === 3) {
        $stepIterator = 0;
    } else {
        $stepIterator++;
    }
}

function previousStep()
{
    global $stepIterator;

    if ($stepIterator === 0) {
        $stepIterator = 3;
    } else {
        $stepIterator--;
    }
}

function getCurrentSquare($grid)
{
    return end($grid);
}

function step($sequence)
{
    global $grid;
    global $stepIterator;

    $currentSquare = getCurrentSquare($grid);

    $x = $currentSquare['x'];
    $y = $currentSquare['y'];

    $sequence[$stepIterator]($x, $y);

    if (! isEmptySquare($grid, $x, $y)) {
        previousStep();

        $x = $currentSquare['x'];
        $y = $currentSquare['y'];

        $sequence[$stepIterator]($x, $y);

        $n = checkSquares($grid, $x, $y);

        array_push($grid, [
            'x' => $x,
            'y' => $y,
            'n' => $n,
        ]);
        nextStep();
    } else {
        $n = checkSquares($grid, $x, $y);

        array_push($grid, [
            'x' => $x,
            'y' => $y,
            'n' => $n,
        ]);
        nextStep();
    }
}

function checkSquares($grid, $x, $y)
{
    $pattern = ['right', 'up', 'left', 'left', 'down', 'down', 'right', 'right'];
    $n = 0;

    for ($i=0; $i < 8; $i++) {
        $pattern[$i]($x, $y);
        foreach ($grid as $square) {
            if ($square['x'] === $x && $square['y'] === $y) {
                $n = $n + $square['n'];
            }
        }
    }

    return $n;
}

for ($i=0; $grid[$i]['n'] <= $input ; $i++) {
    step($sequence, $stepIterator);
}

$output = end($grid)['n'];

echo $output;
