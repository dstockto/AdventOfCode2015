<?php

namespace Day7;

class Puzzle1
{
    public function __invoke()
    {
        $circuit = new Circuit();

        $input = file(__DIR__ . '/../../input/Day7/input.txt');

        foreach ($input as $connection) {
            $circuit->addGroup($connection);
        }

        echo "The value of a is " . $circuit->resolve('a'). "\n\n";
    }
}
