<?php

namespace Day7;

class Puzzle2
{
    public function __invoke()
    {
        $circuit = new Circuit();

        $input = file(__DIR__ . '/../../input/Day7/input.txt');

        foreach ($input as $connection) {
            $circuit->addGroup($connection);
        }

        $circuit->addGroup('3176 -> b');

        echo "The value of a is " . $circuit->resolve('a'). "\n\n";
    }
}
