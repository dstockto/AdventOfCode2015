<?php

namespace spec\Day7;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CircuitSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Day7\Circuit');
    }

    public function it_will_throw_an_exception_for_invalid_symbol()
    {
        $this->shouldThrow(new \InvalidArgumentException('Invalid symbol - a'))->during('resolve', ['a']);
    }

    public function it_can_add_literal_value_group()
    {
        $this->addGroup('123 -> a');

        $this->resolve('a')->shouldBe(123);
    }

    public function it_can_resolve_wire_passthroughs()
    {
        $this->addGroup('123 -> a');
        $this->addGroup('a -> b');

        $this->resolve('b')->shouldBe(123);
    }

    public function it_can_resolve_not_connections()
    {
        $this->addGroup('123 -> x');
        $this->addGroup('NOT x -> h');
        
        $this->resolve('h')->shouldBe(65412);
    }

    public function it_can_resolve_OR_commands()
    {
//        123 -> x
//456 -> y
//    x OR y -> e
//    e: 507
        $this->addGroup('123 -> x');
        $this->addGroup('456 -> y');
        $this->addGroup('x OR y -> e');

        $this->resolve('e')->shouldBe(507);
    }

    public function it_can_resolve_or_with_2_literals()
    {
        $this->addGroup('123 OR 456 -> x');
        $this->resolve('x')->shouldBe(507);
    }

    public function it_can_resolve_OR_with_literal_and_symbol()
    {
        $this->addGroup('123 -> x');
        $this->addGroup('x OR 456 -> y');

        $this->resolve('y')->shouldBe(507);
    }

    public function it_can_resolve_OR_with_symbol_and_literal()
    {
        $this->addGroup('456 -> y');
        $this->addGroup('123 OR y -> e');
        $this->resolve('e')->shouldBe(507);
    }

    public function it_can_resolve_and_instruction()
    {
        $this->addGroup('x AND y -> d');
        $this->addGroup('123 -> x');
        $this->addGroup('456 -> y');
        $this->resolve('d')->shouldBe(72);
    }

    public function it_can_resolve_lshift_instruction()
    {
        $this->addGroup('x LSHIFT 2 -> f');
        $this->addGroup('123 -> x');

        $this->resolve('f')->shouldBe(492);
    }

    public function it_can_resolve_rshift_instruction()
    {
        $this->addGroup('y RSHIFT 2 -> g');
        $this->addGroup('456 -> y');
        
        $this->resolve('g')->shouldBe(114);
    }

    public function it_can_resolve_full_sample_circuit()
    {
        $this->addGroup('123 -> x');
        $this->addGroup('456 -> y');
        $this->addGroup('x AND y -> d');
        $this->addGroup('x OR y -> e');
        $this->addGroup('x LSHIFT 2 -> f');
        $this->addGroup('y RSHIFT 2 -> g');
        $this->addGroup('NOT x -> h');
        $this->addGroup('NOT y -> i');
    
        $this->resolve('d')->shouldBe(72);
        $this->resolve('e')->shouldBe(507);
        $this->resolve('f')->shouldBe(492);
        $this->resolve('g')->shouldBe(114);
        $this->resolve('h')->shouldBe(65412);
        $this->resolve('i')->shouldBe(65079);
        $this->resolve('x')->shouldBe(123);
        $this->resolve('y')->shouldBe(456);
    }
}
