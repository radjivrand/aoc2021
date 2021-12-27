<?php

namespace aoc2021\Crups;

/**
 * 
 */
class Dice
{
    public static $rollCount;
    public $lastRoll = 0;

    function __construct()
    {
        // print_r($this->rollTheDice());
        // code...
    }

    public function rollTheDice(){
        self::$rollCount += 3;
        $roll = $this->lastRoll;
        if ($roll > 100) {
            $roll -= 100;
        }
        $this->lastRoll = $roll + 3;


        // print_r([
        //     $roll + 1 > 100 ? $roll - 99 : $roll + 1,
        //     $roll + 2 > 100 ? $roll - 98 : $roll + 2,
        //     $roll + 3 > 100 ? $roll - 97 : $roll + 3,
        // ]);

        return [
            $roll + 1 > 100 ? $roll - 99 : $roll + 1,
            $roll + 2 > 100 ? $roll - 98 : $roll + 2,
            $roll + 3 > 100 ? $roll - 97 : $roll + 3,
        ];
    }

}