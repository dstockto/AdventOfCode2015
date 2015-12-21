<?php

namespace Day7;

class Circuit
{


    private $symbols = [];

    public function addGroup($group)
    {
        // 123 -> a

        $parts = explode('->', $group);
        $parts[0] = trim($parts[0]);
        $parts[1] = trim($parts[1]);

        $this->symbols[$parts[1]] = $parts[0];
    }

    public function resolve($wire)
    {
        if (is_numeric($wire)) {
            return (int) $wire;
        }

        if (! isset($this->symbols[$wire])) {
            throw new \InvalidArgumentException('Invalid symbol - ' . $wire);
        }

        $formula = $this->symbols[$wire];

        if (is_numeric($formula)) {
            return (int) $formula;
        }

        // pass through wire
        if (preg_match('/^([a-z]+)$/', $formula, $matches)) {
            $value = $this->resolve($matches[1]);
            $this->storeValue($wire, $value);
            return $this->symbols[$wire];
        }

        if (preg_match('/NOT ([a-z]+)/', $formula, $matches)) {
            $symbol = $matches[1];
            $symbolValue = $this->resolve($symbol);

            $symbolValue = ~ $symbolValue;

            $this->storeValue($wire, $symbolValue);

            return $this->symbols[$wire];
        }

        if (preg_match('/(\d+|[a-z]+) OR (\d+|[a-z]+)/', $formula, $matches)) {
            $value1 = $matches[1];
            $value2 = $matches[2];

            $value1 = $this->resolve($value1);
            $value2 = $this->resolve($value2);

            $result = $value1 | $value2;
            $this->storeValue($wire, $result);

            return $this->symbols[$wire];
        }

        if (preg_match('/(\d+|[a-z]+) AND (\d+|[a-z]+)/', $formula, $matches)) {
            $value1 = $matches[1];
            $value2 = $matches[2];

            $value1 = $this->resolve($value1);
            $value2 = $this->resolve($value2);

            $result = $value1 & $value2;
            $this->storeValue($wire, $result);

            return $this->symbols[$wire];
        }

        if (preg_match('/(\d+|[a-z]+) LSHIFT (\d+|[a-z]+)/', $formula, $matches)) {
            $value1 = $matches[1];
            $value2 = $matches[2];

            $value1 = $this->resolve($value1);
            $value2 = $this->resolve($value2);

            $result = $value1 << $value2;
            $this->storeValue($wire, $result);

            return $this->symbols[$wire];
        }

        if (preg_match('/(\d+|[a-z]+) RSHIFT (\d+|[a-z]+)/', $formula, $matches)) {
            $value1 = $matches[1];
            $value2 = $matches[2];

            $value1 = $this->resolve($value1);
            $value2 = $this->resolve($value2);

            $result = $value1 >> $value2;
            $this->storeValue($wire, $result);

            return $this->symbols[$wire];
        }

        return 'Operation not supported';
    }

    private function storeValue($wire, $symbolValue)
    {
        if ($symbolValue < 0) {
            $symbolValue &= 0xFFFF;
        }

        $this->symbols[$wire] = (int) $symbolValue;
    }
}
