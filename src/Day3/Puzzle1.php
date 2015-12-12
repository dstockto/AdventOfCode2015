<?php

namespace Day3;

class Puzzle1
{
    public function __invoke()
    {
        $grid = new Grid;
        $santa = new Santa($grid);
        $elf = new Elf($santa);

        $input = file_get_contents(__DIR__ . '/../../input/Day3/input.txt');

        $elf->readDirections($input);

        $visitedHouses = $grid->getVisitedHouses();

        echo "Total visited houses: " . $visitedHouses . "\n\n";
    }

}
