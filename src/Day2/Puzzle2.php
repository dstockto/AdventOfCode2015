<?php

namespace Day2;

class Puzzle2
{
    public function __invoke()
    {
        $collection = new BoxCollection;
        $input = file(__DIR__ . '/../../input/Day2/input.txt');

        foreach ($input as $boxSpec) {
            $box = new Box($boxSpec);
            $collection->addBox($box);
        }

        $ribbonLength = $collection->getTotalRibbonLength();

        echo "Total length: " . $ribbonLength . "\n\n";
    }

}
