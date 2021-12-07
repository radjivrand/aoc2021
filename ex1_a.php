<?php

namespace aoc2021;

class DepthProbe
{
    public $depth;
    public $amount;

    public function __construct(array $values)
    {
        $this->depth = $values;
        $this->amount = count($this->depth);
    }

    public function countIncrements(): int
    {
        $count = 0;
        for ($i = 0; $i < $this->amount; $i++) {
            $count += ($this->depth[$i + 1] > $this->depth[$i]) ? 1 : 0;
        }
        return $count;
    }

    public function countIncrementsWindowed($windowSize): array
    {
        $res = [];
        for ($i=0; $i <= $this->amount - $windowSize; $i++) { 
            $res[] = $this->getCurrentWindowSum($i, $windowSize);
            // print_r($this->getCurrentWindowSum($i, $windowSize) . PHP_EOL);
        }
        return $res;   
    }

    public function getCurrentWindowSum($index, $windowSize) {
        $res = 0;

        for ($i=0; $i < $windowSize; $i++) { 
            $res += $this->depth[$index + $i];            
        }
        return $res;
    }
}
