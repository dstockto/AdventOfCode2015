<?php

namespace spec\Day1;

use Day1\Elevator;
use Day1\InstructionParser;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FloorObserverSpec extends ObjectBehavior
{
    public function let(InstructionParser $parser)
    {
        $this->beConstructedWith($parser);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Day1\FloorObserver');
    }

    public function it_should_be_an_observer()
    {
        $this->shouldHaveType(\SplObserver::class);
    }

    public function it_should_not_get_instruction_count_when_update_is_called_and_floor_is_not_minus_one(
        InstructionParser $parser,
        Elevator $elevator
    ) {
        $elevator->getFloor()->willReturn(rand(1, 100000));
        $parser->getInstructionCount()->shouldNotBeCalled();

        $this->update($elevator);
    }

    public function it_should_record_instruction_count_if_floor_is_minus_one(InstructionParser $parser, Elevator $elevator)
    {
        $count = rand(1, 100000);
        $parser->getInstructionCount()->willReturn($count);
        $elevator->getFloor()->willReturn(-1);

        $this->update($elevator);

        $this->getInstructionNumber()->shouldBe($count);
    }

    public function it_should_store_only_the_first_instruction_for_basement_entry(
        InstructionParser $parser,
        Elevator $elevator
    ) {
        $count = rand(1, 10000);
        $parser->getInstructionCount()->willReturn($count);
        $elevator->getFloor()->willReturn(-1);

        $this->update($elevator);
        $this->getInstructionNumber()->shouldBe($count);

        $parser->getInstructionCount()->willReturn($count * 2);
        $this->update($elevator);
        $this->getInstructionNumber()->shouldBe($count);
    }
}
