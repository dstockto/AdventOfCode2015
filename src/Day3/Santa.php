<?php

namespace Day3;

class Santa
{
    /**
     * @var Grid
     */
    private $grid;

    private $x = 0;
    private $y = 0;

    public function __construct(Grid $grid)
    {
        $this->grid = $grid;
        $this->visit();
    }

    public function moveWest()
    {
        $this->x--;
        $this->visit();
    }

    private function visit()
    {
        $this->grid->visit($this->x, $this->y);
    }

    public function moveEast()
    {
        $this->x++;
        $this->visit();
    }

    public function moveNorth()
    {
        $this->y++;
        $this->visit();
    }

    public function moveSouth()
    {
        $this->y--;
        $this->visit();
    }
}
