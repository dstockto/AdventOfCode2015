<?php

namespace Day1;

class InstructionParser
{
    /**
     * @var Elevator
     */
    private $elevator;

    public function __construct(Elevator $elevator)
    {
        $this->elevator = $elevator;
    }

    public function parseInstructions($instructions)
    {
        foreach (str_split($instructions) as $char) {
            if ($char == '(') {
                $this->elevator->goUp();
            } else if ($char == ')') {
                $this->elevator->goDown();
            }
        }
    }
}
