<?php

namespace Day2;

class Box implements BoxInterface
{
    private $height;
    private $width;
    private $length;

    public function __construct($boxSpec)
    {
        preg_match('/(\d+)x(\d+)x(\d+)/', $boxSpec, $matches);

        $this->height = (int) $matches[1];
        $this->width = (int) $matches[2];
        $this->length = (int) $matches[3];
    }

    public function getWrappingPaperArea()
    {
        $sideAreas = [
            $this->getFrontArea(),
            $this->getSideArea(),
            $this->getTopArea(),
        ];

        $totalArea = 2 * array_sum($sideAreas) + min($sideAreas);

        return $totalArea;
    }


    public function getRibbonLength()
    {
        $perimeters = [
            $this->getFrontPerimeter(),
            $this->getSidePerimeter(),
            $this->getTopPerimeter()
        ];

        $length = min($perimeters) + $this->getBoxVolume();

        return $length;
    }

    /**
     * @return mixed|null
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return mixed|null
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return mixed|null
     */
    public function getLength()
    {
        return $this->length;
    }

    private function getFrontArea()
    {
        return $this->height * $this->width;
    }

    private function getSideArea()
    {
        return $this->height * $this->length;
    }
    private function getTopArea()
    {
        return $this->length * $this->width;
    }

    private function getBoxVolume()
    {
        return $this->height * $this->width * $this->length;
    }

    private function getFrontPerimeter()
    {
        return 2 * ($this->height + $this->width);
    }

    private function getSidePerimeter()
    {
        return 2 * ($this->height + $this->length);
    }

    private function getTopPerimeter()
    {
        return 2 * ($this->width + $this->length);
    }
}
