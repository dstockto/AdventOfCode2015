<?php

namespace Day5;

class HasDoublePairOfLetters
{
    public function __invoke($word)
    {
        return preg_match('/(..).*\1/', $word) >= 1;
    }
}
