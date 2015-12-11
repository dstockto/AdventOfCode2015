<?php

namespace Day1;

class InstructionParser
{
    /**
     * @var Elevator
     */
    private $elevator;

    private $instructionCount = 0;

    public function __construct(Elevator $elevator)
    {
        $this->elevator = $elevator;
    }

    public function parseInstructions($instructions)
    {
        foreach (str_split($instructions) as $char) {
            if ($char == '(') {
                $this->instructionCount++;
                $this->elevator->goUp();
            } else if ($char == ')') {
                $this->instructionCount++;
                $this->elevator->goDown();
            }
        }
    }

    public function getInstructionCount()
    {
        return $this->instructionCount;
    }
}
