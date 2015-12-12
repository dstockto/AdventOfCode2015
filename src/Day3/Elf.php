<?php

namespace Day3;

class Elf
{
    /**
     * @var Santa
     */
    private $santas = [];

    public function __construct($santas)
    {
        if ($santas instanceof Santa) {
            $santas = [$santas];
        }

        $this->santas = $santas;
    }

    public function readDirections($directions)
    {
        $santaPicker = $this->getSanta();

        foreach (str_split($directions) as $direction) {
            $santa = $santaPicker->current();
            switch ($direction) {
                case '<':
                    $santa->moveWest();
                    break;
                case '>':
                    $santa->moveEast();
                    break;
                case '^':
                    $santa->moveNorth();
                    break;
                case 'v':
                    $santa->moveSouth();
                    break;
            }
            $santaPicker->next();
        }
    }

    public function getSanta()
    {
        while (true) {
            foreach ($this->santas as $santa) {
                yield $santa;
            }
        }
    }
}
