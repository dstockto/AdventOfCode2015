<?php

namespace Day6;

class Light implements LightInterface
{
    private $state = false;

    public function isOn()
    {
        return $this->state;
    }

    public function turnOn()
    {
        $this->state = true;
    }

    public function turnOff()
    {
        $this->state = false;
    }

    public function toggle()
    {
        $this->state = !$this->state;
    }
}
