<?php

namespace Day5;

class Puzzle2
{
    public function __invoke()
    {
        $input = file(__DIR__ . '/../../input/Day5/input.txt');

        $containsDoublePairOfLetters = new HasDoublePairOfLetters();
        $hasLettersWithGuardBetweem = new HasLettersWithGuardBetween();

        $nice = 0;
        foreach ($input as $word) {
            if ($containsDoublePairOfLetters($word) && $hasLettersWithGuardBetweem($word)) {
                $nice++;
            }
        }

        echo "There were " . $nice . " nice strings\n\n";
    }
}
