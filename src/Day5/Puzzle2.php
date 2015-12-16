<?php

namespace Day5;

class Puzzle2
{
    public function __invoke()
    {
        $input = file(__DIR__ . '/../../input/Day5/input.txt');

        $containsDoublePairOfLetters = new HasDoublePairOfLetters();
        $hasLettersWithGuardBetween = new HasLettersWithGuardBetween();

        $nice = 0;
        foreach ($input as $word) {
            if ($containsDoublePairOfLetters($word) && $hasLettersWithGuardBetween($word)) {
                $nice++;
            }
        }

        echo "There were " . $nice . " nice strings\n\n";
    }
}
