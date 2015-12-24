<?php

namespace Day8;

class Puzzle1
{
    public function __invoke()
    {
        $input = file(__DIR__ . '/../../input/Day8/input.txt');

        $total = 0;
        foreach ($input as $line) {
            $counter = new CharCount(trim($line));
            $codeCount = $counter->getCodeCount();
            $charCount = $counter->getCharCount();

            $total += ($codeCount - $charCount);
        }

        echo "Total difference: " . $total . "\n\n";
    }
}
