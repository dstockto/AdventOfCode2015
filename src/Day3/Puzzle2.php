<?php

namespace Day3;

class Puzzle2
{
    public function __invoke()
    {
        $grid  = new Grid;
        $santa = new Santa($grid);
        $roboSanta = new Santa($grid);

        $elf = new Elf([$santa, $roboSanta]);

        $input = file_get_contents(__DIR__ . '/../../input/Day3/input.txt');

        $elf->readDirections($input);

        $visitedHouses = $grid->getVisitedHouses();

        echo "Total visited houses: " . $visitedHouses . "\n\n";
    }
}
