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

    public function it_will_be_brightness_zero_to_start()
    {
        $this->getBrightness()->shouldBe(0);
    }

    public function it_will_get_brighter_with_turn_on_instruction()
    {
        $this->turnOn();
        $this->getBrightness()->shouldBe(1);

        $this->turnOn();
        $this->getBrightness()->shouldBe(2);

        $this->turnOn();
        $this->getBrightness()->shouldBe(3);
    }

    public function it_will_not_go_lower_than_zero_brightness()
    {
        $this->turnOff();
        $this->getBrightness()->shouldBe(0);

        $this->turnOff();
        $this->getBrightness()->shouldBe(0);
    }

    public function it_will_get_less_bright_with_turn_off()
    {
        $this->turnOn();
        $this->turnOff();
        $this->getBrightness()->shouldBe(0);
    }

    public function it_will_get_two_points_brighter_for_toggle()
    {
        $this->toggle();
        $this->getBrightness()->shouldBe(2);

        $this->toggle();
        $this->getBrightness()->shouldBe(4);
    }
}
