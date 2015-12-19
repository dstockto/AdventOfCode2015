<?php

namespace Day6;

class InstructionParser
{
    public function parseLine($line)
    {
//        turn on 668,20 through 935,470
        preg_match('/(?<operation>turn on|turn off|toggle) (?<startX>\d+),(?<startY>\d+) through (?<endX>\d+),(?<endY>\d+)/', $line, $matches);

        return [
            $matches['operation'],
            (int) $matches['startX'],
            (int) $matches['startY'],
            (int) $matches['endX'],
            (int) $matches['endY'],
        ];
    }
}
