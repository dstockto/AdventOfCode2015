<?php

namespace Day5;

class HasLettersWithGuardBetween
{
    public function __invoke($word)
    {
        return preg_match('/(.).\1/', $word) >= 1;
    }
}
