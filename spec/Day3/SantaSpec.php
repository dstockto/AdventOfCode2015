<?php

namespace spec\Day3;

use Day3\Grid;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SantaSpec extends ObjectBehavior
{
    public function let(Grid $grid)
    {
        $this->beConstructedWith($grid);
        $grid->visit(0, 0)->shouldBeCalled();
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Day3\Santa');
    }

    public function it_should_be_able_to_move_west(Grid $grid)
    {
        $grid->visit(-1, 0)->shouldBeCalled();
        $this->moveWest();
    }

    public function it_should_be_able_to_move_west_more_than_once(Grid $grid)
    {
        $grid->visit(-1, 0)->shouldBeCalled();
        $grid->visit(-2, 0)->shouldBeCalled();

        $this->moveWest();
        $this->moveWest();
    }

    public function it_should_be_able_to_move_east(Grid $grid)
    {
        $grid->visit(1, 0)->shouldBeCalled();
        $grid->visit(2, 0)->shouldBeCalled();

        $this->moveEast();
        $this->moveEast();
    }

    public function it_should_be_able_to_move_north(Grid $grid)
    {
        $grid->visit(0, 1)->shouldBeCalled();
        $grid->visit(0, 2)->shouldBeCalled();

        $this->moveNorth();
        $this->moveNorth();
    }

    public function it_should_be_able_to_move_south(Grid $grid)
    {
        $grid->visit(0, -1)->shouldBeCalled();
        $grid->visit(0, -2)->shouldBeCalled();

        $this->moveSouth();
        $this->moveSouth();
    }
}
