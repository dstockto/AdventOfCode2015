<?php

namespace Day8;

class Puzzle2
{
    public function __invoke()
    {
        $input = file(__DIR__ . '/../../input/Day8/input.txt');

        $total = 0;
        foreach ($input as $line) {
            $counter = new CharCount(trim($line));
            $encodedCount = $counter->getEncodedCount();
            $codeCount = $counter->getCodeCount();

            $total += ($encodedCount - $codeCount);
        }

        echo "Total difference: " . $total . "\n\n";
    }
}
