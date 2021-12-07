<?php

namespace aoc2021;

class Fish
{
    public $lamps;

    function __construct($string)
    {
        $this->lamps = array_fill_keys([0,1,2,3,4,5,6,7,8], NULL);

        $arr = preg_split('/\,/', $string);
        sort($arr);
        $arr = array_count_values($arr);
        // print_r($arr);

        foreach ($this->lamps as $key => &$value) {
            $value = $arr[$key];
        }

        // print_r($this->lamps);
    }

    public function passDay()
    {
        $newBabies = $this->lamps[0];
        array_shift($this->lamps);
        $this->lamps[6] += $newBabies;
        $this->lamps[8] += $newBabies;
        // print_r($this->lamps);
    }

    public function ffwd($days)
    {
        while ($days > 0) {
            $this->passDay();
            $days --;
        }
    }

    public function countFish()
    {
        $sum = 0;

        foreach ($this->lamps as $value) {
            $sum += $value;
        }

        return $sum;
    }

}