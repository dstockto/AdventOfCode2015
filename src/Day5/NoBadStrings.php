<?php

namespace Day5;

class NoBadStrings
{
    public function __invoke($word)
    {
        return preg_match('/ab|cd|pq|xy/', $word) == 0;
    }
}
