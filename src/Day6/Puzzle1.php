<?php

namespace Day6;

class Puzzle1
{
    public function __invoke()
    {
        $light = new Light();
        $grid = new Grid(1000, 1000, $light);
        $parser = new InstructionParser();

        $input = file(__DIR__ . '/../../input/Day6/input.txt');

        foreach ($input as $line) {
            // Parse instruction, pass to grid
            $commands = $parser->parseLine($line);
            $grid->doOperation($commands[0], $commands[1], $commands[2], $commands[3], $commands[4]);
        }

        $numberOfLights = $grid->getLitLightCount();

        echo "Total lit lights: " . $numberOfLights . "\n\n";
    }

}
