<?php

namespace spec\Day5;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HasDuplicatedLetterSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Day5\HasDuplicatedLetter');
    }

    public function it_is_valid_if_it_has_duplicated_letter()
    {
        $this->__invoke('aadkfjlsghlfkjghsl')->shouldBe(true);
        $this->__invoke('aslkjhdfkjhhl')->shouldBe(true);
    }

    public function it_is_not_valid_if_no_duplicated_letters()
    {
        $this->__invoke('abcdefghij')->shouldBe(false);
        $this->__invoke('98765432kjhgfds')->shouldBe(false);
    }
}
