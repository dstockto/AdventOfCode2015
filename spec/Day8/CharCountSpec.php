<?php

namespace spec\Day8;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CharCountSpec extends ObjectBehavior
{

    public function it_is_initializable()
    {
        $this->beConstructedWith('""');
        $this->shouldHaveType('Day8\CharCount');
    }

    public function it_counts_blank_string_as_two_code_characters()
    {
        $this->beConstructedWith('""');
        $this->getCodeCount()->shouldBe(2);
    }

    public function it_counts_blank_string_as_zero_characters()
    {
        $this->beConstructedWith('""');
        $this->getCharCount()->shouldBe(0);
    }

    public function it_counts_string_abc_as_5_characters_of_code()
    {
        $this->beConstructedWith('"abc"');
        $this->getCodeCount()->shouldBe(5);
    }

    public function it_counts_abc_string_as_3_characters()
    {
        $this->beConstructedWith('"abc"');
        $this->getCharCount()->shouldBe(3);
    }

    public function it_counts_embedded_quotes_string_as_10_characters_of_code()
    {
        $this->beConstructedWith('"aaa\"aaa"');
        $this->getCodeCount()->shouldBe(10);
    }

    public function it_counts_escaped_characters_as_one_character()
    {
        $this->beConstructedWith('"aaa\"aaa"');
        $this->getCharCount()->shouldBe(7);
    }

    public function it_counts_code_with_embedded_hex_correctly()
    {
        $this->beConstructedWith('"\x27"');
        $this->getCodeCount()->shouldBe(6);
        $this->getCharCount()->shouldBe(1);
    }

    public function it_counts_code_with_multiple_embedded_hex_correctly()
    {
        $this->beConstructedWith('"\x27\x35"');
        $this->getCodeCount()->shouldBe(10);
        $this->getCharCount()->shouldBe(2);
    }

    public function it_will_get_the_diffeence_between_code_and_character_counts()
    {
        $this->beConstructedWith('""');
        $this->getCharacterDifference()->shouldBe(2);

    }

    public function it_will_get_difference_for_hex_string()
    {
        $this->beConstructedWith('"\x27\x35"');
        $this->getCharacterDifference()->shouldBe(8);
    }

    public function it_will_encode_double_backslash_properly()
    {
        $this->beConstructedWith('"\\\\"');
        $this->getCodeCount()->shouldBe(4);
        $this->getCharCount()->shouldBe(1);
    }

    public function it_will_deal_with_escaped_quote_at_end_of_string()
    {
        $this->beConstructedWith('"qsmzhnx\""');
        $this->getCodeCount()->shouldBe(11);
        $this->getCharCount()->shouldBe(8);
    }

    public function it_can_encode_blank_string()
    {
        $this->beConstructedWith('""');
        $this->getEncodedCount()->shouldBe(6);
    }

    public function it_can_encode_normal_strings()
    {
        $this->beConstructedWith('"abc"');
        $this->getEncodedCount()->shouldBe(9);
    }

    public function it_can_encode_strings_with_embedded_quotes()
    {
        $this->beConstructedWith('"aaa\"aaa"');
        
        $this->getEncodedCount()->shouldBe(16);
    }

    public function it_can_encode_strings_with_hex()
    {
        $this->beConstructedWith('"\x27"');
        $this->getEncodedCount()->shouldBe(11);
    }
}
