<?php

namespace spec\Day6;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Puzzle1Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day6\Puzzle1');
    }
}
