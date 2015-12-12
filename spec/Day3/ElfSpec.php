<?php

namespace spec\Day3;

use Day3\Santa;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ElfSpec extends ObjectBehavior
{
    public function let(Santa $santa)
    {
        $this->beConstructedWith($santa);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Day3\Elf');
    }

    public function it_will_tell_santa_west_for_less_than(Santa $santa)
    {
        $this->readDirections('<');

        $santa->moveWest()->shouldHaveBeenCalled();
    }

    public function it_will_tell_santa_east_for_greater_than(Santa $santa)
    {
        $this->readDirections('>');

        $santa->moveEast()->shouldHaveBeenCalled();
    }

    public function it_will_tell_santa_north_for_caret(Santa $santa)
    {
        $this->readDirections('^');

        $santa->moveNorth()->shouldHaveBeenCalled();
    }

    public function it_will_tell_santa_south_for_v(Santa $santa)
    {
        $this->readDirections('v');

        $santa->moveSouth()->shouldHaveBeenCalled();
    }

    public function it_can_tell_santa_west_several_times(Santa $santa)
    {
        $this->readDirections('<<<<<<<<');
        $santa->moveWest()->shouldHaveBeenCalledTimes(8);
    }

    public function it_will_tell_santa_multiple_directions(Santa $santa)
    {
        $this->readDirections('^v><');

        $santa->moveNorth()->shouldHaveBeenCalled();
        $santa->moveSouth()->shouldHaveBeenCalled();
        $santa->moveEast()->shouldHaveBeenCalled();
        $santa->moveWest()->shouldHaveBeenCalled();
    }

    public function it_will_read_only_the_directions_it_should(Santa $santa)
    {
        $this->readDirections('^v');

        $santa->moveNorth()->shouldHaveBeenCalledTimes(1);
        $santa->moveSouth()->shouldHaveBeenCalledTimes(1);

        $santa->moveEast()->shouldNotHaveBeenCalled();
        $santa->moveWest()->shouldNotHaveBeenCalled();
    }

    public function it_should_allow_multiple_santas(Santa $santa, Santa $roboSanta)
    {
        $this->beConstructedWith([$santa, $roboSanta]);

        $santa->moveWest()->shouldBeCalled();
        $roboSanta->moveEast()->shouldBeCalled();

        $this->readDirections('<>');
    }

    public function it_should_allow_multiple_santas_and_multiple_directions(Santa $santa, Santa $roboSanta)
    {
        $this->beConstructedWith([$santa, $roboSanta]);

        $santa->moveWest()->shouldBeCalled();
        $santa->moveEast()->shouldBeCalled();

        $roboSanta->moveNorth()->shouldBeCalled();
        $roboSanta->moveSouth()->shouldBeCalled();

        $this->readDirections('<^>v');
    }
}
