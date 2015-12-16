<?php

namespace spec\Day5;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Puzzle1Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day5\Puzzle1');
    }
}
