<?php

namespace Day5;

class Puzzle1
{
    public function __invoke()
    {
        $input = file(__DIR__ . '/../../input/Day5/input.txt');

        $containThreeVowels = new ContainsThreeVowels();
        $containsDuplicatedLetter = new HasDuplicatedLetter();
        $doesNotContainBadStrings = new NoBadStrings();

        $nice = 0;
        foreach ($input as $word) {
            if ($containThreeVowels($word) && $containsDuplicatedLetter($word) && $doesNotContainBadStrings($word)) {
                $nice++;
            }
        }

        echo "There were " . $nice . " nice strings\n\n";
    }
}
