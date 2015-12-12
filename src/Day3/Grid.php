<?php

namespace Day3;

class Grid
{
    private $visits = 0;

    private $houses = [];

    public function getVisitedHouses()
    {
        return $this->visits;
    }

    public function visit($x, $y)
    {
        if (! isset($this->houses[$x][$y])) {
            $this->visits++;
            $this->houses[$x][$y] = true;
        }
    }
}
