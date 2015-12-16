<?php

namespace spec\Day5;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NoBadStringsSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Day5\NoBadStrings');
    }

    public function it_should_be_valid_if_no_bad_strings()
    {
        $this->__invoke('poiuytrewlkjhgfd')->shouldBe(true);
        $this->__invoke('0987654e3w21')->shouldBe(true);
    }

    public function it_should_not_be_valid_if_bad_strings()
    {
        $this->__invoke('756346ab')->shouldBe(false);
        $this->__invoke('89tugiocdrklmsv')->shouldBe(false);
        $this->__invoke('pq54ugeiorjfkwfijho')->shouldBe(false);
        $this->__invoke('sadvkxyhjsadfpqkjhfsahkjl')->shouldBe(false);
    }
}
