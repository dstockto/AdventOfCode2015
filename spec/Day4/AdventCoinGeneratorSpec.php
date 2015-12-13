<?php

namespace spec\Day4;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AdventCoinGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('abcdef');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Day4\AdventCoinGenerator');
    }

    public function it_will_generate_a_sequence_of_candidate_coins()
    {
        $generator = $this();

        $generator->current()->shouldBe('abcdef1');
        $generator->next();
        $generator->current()->shouldBe('abcdef2');
        $generator->next();
        $generator->current()->shouldBe('abcdef3');
        $generator->next();
        $generator->current()->shouldBe('abcdef4');
    }
}
