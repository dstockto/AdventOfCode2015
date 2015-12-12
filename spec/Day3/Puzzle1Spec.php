<?php

namespace spec\Day3;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Puzzle1Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day3\Puzzle1');
    }
}
