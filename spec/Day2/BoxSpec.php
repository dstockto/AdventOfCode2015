<?php

namespace spec\Day2;

use Day2\BoxInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BoxSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('2x3x4');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Day2\Box');
    }

    public function it_will_implement_BoxInterface()
    {
        $this->shouldHaveType(BoxInterface::class);
    }

    public function it_can_get_height()
    {
        $this->getHeight()->shouldBe(2);
    }

    public function it_can_get_width()
    {
        $this->getWidth()->shouldBe(3);
    }

    public function it_can_get_length()
    {
        $this->getLength()->shouldBe(4);
    }

    public function it_can_calculate_wrapping_paper_area()
    {
        $this->getWrappingPaperArea()->shouldBe(58);
    }

    public function it_can_calculate_wrapping_paper_for_skinny_boxes()
    {
        $this->beConstructedWith('1x1x10');
        $this->getWrappingPaperArea()->shouldBe(43);
    }

    public function it_can_calculate_ribbon_length_for_box()
    {
        $this->getRibbonLength()->shouldBe(34);
    }

    public function it_can_calculate_ribbon_for_skinny_box()
    {
        $this->beConstructedWith('1x1x10');
        $this->getRibbonLength()->shouldBe(14);
    }
}
