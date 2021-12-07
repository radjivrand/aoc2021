<?php

namespace aoc2021;

class Crab
{
    public $lineup;
    public $start;
    public $end;

    function __construct($string)
    {
        $arr = preg_split('/\,/', $string);
        $arr = array_count_values($arr);
        // sort($arr);
        $this->lineup = $arr;

        $keys = array_keys($arr);
        sort($keys);

        $this->start = $keys[0];
        $this->end = $keys[array_key_last($keys)];
    }

    public function getFuelToPosition($destination)
    {
        $fuel = 0;

        foreach ($this->lineup as $pos => $amount) {
            $fuel += abs($pos - $destination) * $amount;
        }

        return $fuel;
    }

    public function getFuelToPositionFactorial($destination)
    {
        $fuel = 0;

        foreach ($this->lineup as $pos => $amount) {
            $series = abs($pos - $destination);
            $f = ($series * ($series + 1)) / 2;
            $fuel += $f * $amount;
            // print_r($f . PHP_EOL);
        }

        return $fuel;
    }

    public function findLeastFuel()
    {
        $least = 0;
        for ($i=$this->start; $i <= $this->end; $i++) { 
            $fuel = $this->getFuelToPositionFactorial($i);
            if ($least == 0 || $fuel < $least) {
                $least = $fuel;
                $position = $i;
            }
        }

        return [$position, $least];
    }
}