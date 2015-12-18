<?php

namespace Day6;

interface LightInterface
{

    public function isOn();

    public function turnOn();

    public function turnOff();

    public function toggle();
}
