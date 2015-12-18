<?php

namespace Day6;

class Grid
{
    private $grid;
    private $width;
    private $height;

    public function __construct($width, $height, LightInterface $light)
    {
        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {
                $this->grid[$x][$y] = clone $light;
            }
        }
        $this->width = $width;
        $this->height = $height;
    }

    public function getLitLightCount()
    {
        $count = 0;

        for ($x = 0; $x < $this->width; $x++) {
            for ($y = 0; $y < $this->height; $y++) {
                if ($this->grid[$x][$y]->isOn()) {
                    $count++;
                }
            }
        }

        return $count;
    }

    public function doOperation($operation, $startX, $startY, $endX, $endY)
    {
        $operationMap = [
            'turn on' => 'turnOn',
            'turn off' => 'turnOff',
            'toggle' => 'toggle',
        ];

        $method = $operationMap[$operation];

        for ($x = $startX; $x <= $endX; $x++) {
            for ($y = $startY; $y <= $endY; $y++) {
                $this->grid[$x][$y]->$method();
            }
        }
    }

    public function getTotalBrightness()
    {
        $brightness = 0;

        for ($x = 0; $x < $this->width; $x++) {
            for ($y = 0; $y < $this->height; $y++) {
                $brightness += $this->grid[$x][$y]->getBrightness();
            }
        }

        return $brightness;
    }
}
