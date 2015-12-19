<?php

namespace Day6;

class Light implements LightInterface
{
    private $state = false;

    private $brightness = 0;

    public function isOn()
    {
        return $this->state;
    }

    public function turnOn()
    {
        $this->state = true;
        $this->brightness++;
    }

    public function turnOff()
    {
        $this->state = false;

        $this->brightness = max(0, $this->brightness - 1);
    }

    public function toggle()
    {
        $this->state = !$this->state;
        $this->brightness += 2;
    }

    public function getBrightness()
    {
        return $this->brightness;
    }
}
