<?php

namespace spec\Day4;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CollisionValidatorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('00000');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Day4\CollisionValidator');
    }

    public function it_is_valid_if_string_starts_with_collision_string()
    {
        $myString = '00000' . uniqid('random_junk');

        $this->isValid($myString)->shouldBe(true);
    }

    public function it_is_not_valid_if_it_does_not_start_with_collision_string()
    {
        $myString = 'banana' . uniqid('random_junk');

        $this->isValid($myString)->shouldBe(false);
    }
}
