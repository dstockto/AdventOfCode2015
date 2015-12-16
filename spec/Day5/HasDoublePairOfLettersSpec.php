<?php

namespace spec\Day5;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HasDoublePairOfLettersSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Day5\HasDoublePairOfLetters');
    }

    public function it_is_valid_if_it_has_a_double_pair_of_letters()
    {
        $examples = [
            'xyxy',
            'aabcdefgaa',
            'blaanaaaba',
        ];

        foreach ($examples as $example) {
            $this->__invoke($example)->shouldBe(true);
        }
    }

    public function it_is_not_valid_if_no_double_pair()
    {
        $examples = [
            'aaa',
            'abcdefgh',
            'bcaadef',
        ];

        foreach ($examples as $example) {
            $this->__invoke($example)->shouldBe(false);
        }
    }
}
