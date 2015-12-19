<?php

namespace spec\Day6;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InstructionParserSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Day6\InstructionParser');
    }

    public function it_can_parse_a_turn_on_line()
    {
        $line = 'turn on 668,20 through 935,470';

        $this->parseLine($line)->shouldBe(
            [
                'turn on',
                668,
                20,
                935,
                470
            ]
        );
    }

    public function it_can_parse_a_turn_off_line()
    {
        $line = 'turn off 487,286 through 540,328';

        $this->parseLine($line)->shouldBe(
            [
                'turn off',
                487,
                286,
                540,
                328
            ]
        );
    }

    public function it_can_parse_a_toggle_line()
    {
        $line = 'toggle 247,874 through 840,955';
        $this->parseLine($line)->shouldBe(
            [
                'toggle',
                247,
                874,
                840,
                955
            ]
        );
    }
}
