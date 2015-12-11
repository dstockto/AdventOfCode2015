<?php

namespace spec\Day2;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Puzzle2Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day2\Puzzle2');
    }
}
