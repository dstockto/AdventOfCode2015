<?php

namespace Day4;

class AdventCoinGenerator
{
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function __invoke()
    {
        $counter = 1;

        while (true) {
            $string = $this->key . $counter;
            yield $string;
            $counter++;
        }
    }
}
