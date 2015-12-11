<?php

namespace Day2;

class Puzzle1
{
    public function __invoke()
    {
        $collection = new BoxCollection;
        $input = file(__DIR__ . '/../../input/Day2/input.txt');

        foreach ($input as $boxSpec) {
            $box = new Box($boxSpec);
            $collection->addBox($box);
        }

        $wrappingPaperArea = $collection->getTotalWrappingPaperArea();

        echo "Total area: " . $wrappingPaperArea . "\n\n";
    }
}
