<?php

namespace spec\Day1;

use Day1\Elevator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InstructionParserSpec extends ObjectBehavior
{
    public function let(Elevator $elevator)
    {
        $this->beConstructedWith($elevator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Day1\InstructionParser');
    }

    public function it_will_go_up_for_open_paren(Elevator $elevator)
    {
        $elevator->goUp()->shouldBeCalled();

        $this->parseInstructions('(');
    }

    public function it_will_go_down_for_close_paren(Elevator $elevator)
    {
        $this->parseInstructions(')');

        $elevator->goDown()->shouldHaveBeenCalled();
    }

    public function it_can_use_multiple_parens_to_control_elevator(Elevator $elevator)
    {
        $elevator->goUp()->shouldBeCalledTimes(6);
        $elevator->goDown()->shouldBeCalledTimes(3);
        $this->parseInstructions('(()()(()(');
    }

    public function it_will_start_with_zero_instructions()
    {
        $this->getInstructionCount()->shouldBe(0);
    }

    public function it_will_track_how_many_instruction_it_has_seen()
    {
        $this->parseInstructions('()(()((()(');

        $this->getInstructionCount()->shouldBe(10);
    }
}
