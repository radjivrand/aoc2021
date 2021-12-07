<?php

namespace aoc2021;

use aoc2021\Card;

/**
 * 
 */
class Game
{
    public $turn;
    public $nosToCall;
    public $cards;
    static public $lastNumber;
   
    function __construct($numbers, $cardArray)
    {
        $this->turn ++;
        $this->nosToCall = preg_split('/\,/', $numbers);

        foreach ($cardArray as $value) {
            $this->cards[] = new Card($value); 
        }

    }

    public function play()
    {
        foreach ($this->nosToCall as $number) {
            foreach ($this->cards as $card) {
                $card->mark($number);
                $this->lastNumber = $number;
                // $card->output();

                if ($card->checkforWin()) {
                    return $card;
                    break 2;
                }
            }
        }


    }

    public function createCard(string $input)
    {
        
            
        // code...
    }

    public function numberOfTurnsNeeded(): int
    {
        // code...
    }
}