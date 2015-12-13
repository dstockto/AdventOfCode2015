<?php

namespace Day4;

class Puzzle1
{
    public function __invoke()
    {
        $key = 'iwrupvqb';

        $generator = new AdventCoinGenerator($key);

        $transform = new Md5Transformer;

        $validator = new CollisionValidator('00000');

        $candidateCoin = $generator();

        foreach ($candidateCoin as $coin) {
            $hash = $transform->transform($coin);
            if ($validator->isValid($hash)) {
                break;
            }
        }

        echo "Valid coin found: " . $coin . "\n\n";
    }

}
