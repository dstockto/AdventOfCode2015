<?php

namespace Day1;

class Puzzle1
{
    public function __invoke()
    {
        $instructions = file_get_contents(__DIR__ . '/../../input/Day1/input.txt');

        $elevator = new Elevator();
        $parser = new InstructionParser($elevator);

        $parser->parseInstructions($instructions);

        echo "Final floor: " . $elevator->getFloor() . "\n\n";
    }
}
