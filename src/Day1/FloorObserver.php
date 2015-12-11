<?php

namespace Day1;

use SplSubject;

class FloorObserver implements \SplObserver
{

    /**
     * @var InstructionParser
     */
    private $parser;
    private $instructionNumber;

    public function __construct(InstructionParser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * Receive update from subject
     * @link http://php.net/manual/en/splobserver.update.php
     *
     * @param SplSubject $elevator <p>
     * The <b>SplSubject</b> notifying the observer of an update.
     * </p>
     *
     * @return void
     * @since 5.1.0
     */
    public function update(SplSubject $elevator)
    {
        if ($elevator instanceof  Elevator) {
            if ($elevator->getFloor() == -1) {
                if (is_null($this->instructionNumber)) {
                    $this->instructionNumber = $this->parser->getInstructionCount();
                }
            }
        }
    }

    public function getInstructionNumber()
    {
        return $this->instructionNumber;
    }
}
