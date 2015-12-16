<?php

namespace spec\Day5;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HasLettersWithGuardBetweenSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Day5\HasLettersWithGuardBetween');
    }

    public function it_is_valid_if_two_same_letters_have_another_letter_between()
    {
        $examples = [
            'aba',
            'aaa',
            '24efhowiodo234143tafd',
        ];

        foreach ($examples as $example) {
            $this->__invoke($example)->shouldBe(true);
        }

    }

    public function it_is_not_valid_if_no_guard_between_two_same_letters()
    {
        $examples = [
            '65uhrtfv',
            'abba',
            '213256oogahjdks',
        ];

        foreach ($examples as $example) {
            $this->__invoke($example)->shouldBe(false);
        }
    }
}
