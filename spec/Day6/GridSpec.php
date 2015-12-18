<?php

namespace spec\Day6;

use Day6\LightInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GridSpec extends ObjectBehavior
{
    public function let(LightInterface $light)
    {
        $this->beConstructedWith(10, 10, $light);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Day6\Grid');
    }

    public function it_is_all_off_to_start(LightInterface $light)
    {
        $light->isOn()->willReturn(false);

        $this->getLitLightCount()->shouldBe(0);
    }

    public function it_will_be_all_lit_if_lights_are_all_on(LightInterface $light)
    {
        $light->isOn()->willReturn(true);

        $this->getLitLightCount()->shouldBe(100);
    }

    public function it_can_do_turn_on_operations_on_the_grid(LightInterface $light)
    {
        $light->turnOn()->shouldBeCalledTimes(4);

        $this->doOperation('turn on', 0, 0, 1, 1);
    }

    public function it_can_do_turn_off_operations_on_the_grid(LightInterface $light)
    {
        $light->turnOff()->shouldBeCalledTimes(36);

        $this->doOperation('turn off', 0, 0, 5, 5);
    }

    public function it_can_do_toggle_operations_on_the_grid(LightInterface $light)
    {
        $light->toggle()->shouldBeCalledTimes(25);
        $this->doOperation('toggle', 1, 1, 5, 5);
    }
}
