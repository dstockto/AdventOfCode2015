<?php

namespace Day5;

class ContainsThreeVowels
{
    public function __invoke($word)
    {
        return preg_match_all('/[aeiou]/', $word) >= 3;
    }
}
