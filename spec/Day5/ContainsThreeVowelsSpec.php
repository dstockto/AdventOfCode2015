<?php

namespace spec\Day5;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ContainsThreeVowelsSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Day5\ContainsThreeVowels');
    }

    public function it_will_be_valid_if_string_has_three_vowels()
    {
        $this->__invoke('abcdeiou')->shouldBe(true);
        $this->__invoke('aei')->shouldBe(true);
    }

    public function it_will_not_be_valid_if_string_does_not_have_three_vowels()
    {
        $this->__invoke('cdefghi')->shouldBe(false);
        $this->__invoke('bcd')->shouldBe(false);
    }
}
