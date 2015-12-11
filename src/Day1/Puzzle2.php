<?php

namespace Day1;

class Puzzle2
{
    public function __invoke()
    {
        $elevator = new Elevator();
        $parser   = new InstructionParser($elevator);
        $observer = new FloorObserver($parser);

        $elevator->attach($observer);

        $input = file_get_contents(__DIR__ . '/../../input/Day1/input.txt');

        $parser->parseInstructions($input);

        echo "We went into the basement at instruction: " . $observer->getInstructionNumber()
             . "\n\n";
    }
}
