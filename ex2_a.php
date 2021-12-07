<?php
namespace aoc2021;

class Submarine
{
    public $distance;
    public $depth;

    public $instancecounter;

    //part 2
    public $aim;

    public function __construct()
    {
        $this->distance = 0;
        $this->depth = 0;

        //part 2
        $this->aim = 0;
        $this->instancecounter = [0,0,0,0,0];
    }

    public function tracker(string $instruction)
    {
        $instruction = explode(' ', $instruction);

        switch ($instruction[0]) {
            case 'forward':
                $this->distance += $instruction[1];

                //part 2
                $this->depth += $instruction[1] * $this->aim;
                break;
            
            case 'down':
                // $this->depth += $instruction[1];

                //part 2
                $this->aim += $instruction[1];
                break;
            
            case 'up':
                // $this->depth -= $instruction[1];

                //part 2
                $this->aim -= $instruction[1];
                break;
            
            default:
                // code...
                break;
        }
    }    

    public function powerMeter(string $row)
    {
        $arr = str_split(rtrim($row));
        foreach ($arr as $key => $value) {
            $this->instancecounter[$key] += ($value == '1') ? 1 : -1;
        }
    }

    public function calculateConsumption()
    {
        $gamma = '';
        foreach ($this->instancecounter as $value) {
            $gamma .= $value > 0 ? '1' : '0';
        }
        return bindec($gamma) * bindec((int)strtr($gamma, [1, 0]));
    }

    public function getRating($arr, $index, $oxygen = true)
    {
        print_r($this->instancecounter);
        $this->instancecounter = [];
        foreach ($arr as $row) {
            $this->powerMeter($row);
        }

        $currentNo = $this->instancecounter[$index];
        $currentVal = $currentNo >= 0 ? 1 : 0;

        $res = [];

        foreach ($arr as $row) {
            if ($oxygen) {
                if ($row[$index] == $currentVal) {
                    $res[] = rtrim($row);
                }
            } else {
                if ($row[$index] != $currentVal) {
                    $res[] = rtrim($row);
                }
            }
        }

        return $res;
    }
}