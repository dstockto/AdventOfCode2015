<?php

namespace spec\Day4;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Md5TransformerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day4\Md5Transformer');
    }

    public function it_should_hash_joey_correctly()
    {
        $this->transform('Joey')->shouldBe('f8d623a78c27641412debac4080ece7a');
        
        $this->transform('joey')->shouldBe('d6ba0682d75eb986237fb6b594f8a31f');
    }
}
