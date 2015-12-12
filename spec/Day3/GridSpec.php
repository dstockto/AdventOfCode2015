<?php

namespace spec\Day3;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GridSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Day3\Grid');
    }

    public function it_should_have_no_houses_visited_to_start()
    {
        $this->getVisitedHouses()->shouldBe(0);
    }

    public function it_can_visit_a_house()
    {
        $x = rand(-1000, 1000);
        $y = rand(-1000, 1000);
        $this->visit($x, $y);

        $this->getVisitedHouses()->shouldBe(1);
    }

    public function it_can_visit_a_couple_of_houses()
    {
        $x = rand(-1000, 1000);
        $y = rand(-1000, 1000);
        $this->visit($x, $y);

        $this->getVisitedHouses()->shouldBe(1);

        $x = rand(2000, 3000);
        $y = rand(2000, 3000);
        $this->visit($x, $y);

        $this->getVisitedHouses()->shouldBe(2);
    }

    public function it_will_count_visits_only_once_per_house()
    {
        $this->visit(0, 0);
        $this->visit(1, 1);
        $this->visit(0, 0);

        $this->getVisitedHouses()->shouldBe(2);
    }
}
