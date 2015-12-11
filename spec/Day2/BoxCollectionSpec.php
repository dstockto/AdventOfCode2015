<?php

namespace spec\Day2;

use Day2\BoxInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BoxCollectionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Day2\BoxCollection');
    }

    public function it_will_allow_you_to_hold_boxes(BoxInterface $box)
    {
        $this->addBox($box);

        $boxes = $this->getBoxes();
        $boxes[0]->shouldBe($box);
    }

    public function it_should_be_able_to_get_total_wrapping_paper_area_from_contained_boxes(
        BoxInterface $box1,
        BoxInterface $box2
    ) {
        $box1Area = rand(1, 500);
        $box2Area = rand(1, 500);

        $box1->getWrappingPaperArea()->willReturn($box1Area);
        $box2->getWrappingPaperArea()->willReturn($box2Area);

        $this->addBox($box1);
        $this->addBox($box2);

        $this->getTotalWrappingPaperArea()->shouldBe($box1Area + $box2Area);
    }

    public function it_should_be_able_to_get_total_ribbon_length_from_contained_boxes(BoxInterface $box1, BoxInterface $box2)
    {
        $box1Length = rand(1, 1000);
        $box2Length = rand(1, 1000);

        $box1->getRibbonLength()->willReturn($box1Length);
        $box2->getRibbonLength()->willReturn($box2Length);

        $this->addBox($box1);
        $this->addBox($box2);

        $this->getTotalRibbonLength()->shouldBe($box1Length + $box2Length);
    }
}
