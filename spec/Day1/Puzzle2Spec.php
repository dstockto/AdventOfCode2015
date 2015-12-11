<?php

namespace spec\Day1;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Puzzle2Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day1\Puzzle2');
    }
}
