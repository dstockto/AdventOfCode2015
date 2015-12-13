<?php

namespace Day4;

class CollisionValidator
{
    private $collisionString;

    public function __construct($collisionString)
    {
        $this->collisionString = $collisionString;
    }

    public function isValid($string)
    {
        return strpos($string, $this->collisionString) === 0;
    }
}
