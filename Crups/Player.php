<?php

namespace aoc2021\Crups;

/**
 * 
 */
class Player
{
    public $score;
    public $position;
    
    function __construct($startingPosition)
    {
        $this->score = 0;
        $this->position = $startingPosition;
        // print_r($this);
    }

    public function getScore($array)
    {
        $sum = array_sum($array);
        $numbers = str_split((string)$sum);
        $currentScore = end($numbers) == 0 ? 10 : end($numbers);

        $movesTo = $this->position + $currentScore;

        $this->position = $movesTo > 10 ? $movesTo - 10 : $movesTo;

        $this->score += $this->position;
    }


}