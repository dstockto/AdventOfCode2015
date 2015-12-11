<?php

namespace Day2;

class BoxCollection
{
    /** @var BoxInterface[]  */
    private $boxes = [];

    public function addBox(BoxInterface $box)
    {
        $this->boxes[] = $box;
    }

    public function getBoxes()
    {
        return $this->boxes;
    }

    public function getTotalWrappingPaperArea()
    {
        $total = 0;
        foreach ($this->boxes as $box) {
            $total += $box->getWrappingPaperArea();
        }

        return $total;
    }

    public function getTotalRibbonLength()
    {
        $total = 0;
        foreach ($this->boxes as $box) {
            $total += $box->getRibbonLength();
        }

        return $total;
    }
}
