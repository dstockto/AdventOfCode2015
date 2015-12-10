<?php

namespace spec\Day1;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Puzzle1Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day1\Puzzle1');
    }
}
