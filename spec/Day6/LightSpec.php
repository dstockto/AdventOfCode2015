<?php

namespace spec\Day6;

use Day6\LightInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LightSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Day6\Light');
    }

    public function it_should_be_a_LightInterface()
    {
        $this->shouldImplement(LightInterface::class);
    }

    public function it_should_be_off_by_default()
    {
        $this->isOn()->shouldBe(false);
    }

    public function it_can_be_turned_on()
    {
        $this->turnOn();
        $this->isOn()->shouldBe(true);
    }

    public function it_can_be_turned_off()
    {
        $this->turnOn();
        $this->isOn()->shouldBe(true);
        $this->turnOff();

        $this->isOn()->shouldBe(false);
    }

    public function it_can_be_toggled()
    {
        $this->toggle();
        $this->isOn()->shouldBe(true);
        $this->toggle();
        $this->isOn()->shouldBe(false);
    }
}
