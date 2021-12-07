<?php

namespace aoc2021;

class Line
{
    public $x1;
    public $y1;
    public $x2;
    public $y2;
    public static $id = 1;

    public function __construct(string $input)
    {
        $pairs = preg_split('/\s\-\>\s/', $input);
        $firstPair = preg_split('/\,/', $pairs[0]);
        $secondPair = preg_split('/\,/', $pairs[1]);

        //constraint for hor/ver only
        if ($firstPair[0] == $secondPair[0] || $firstPair[1] == $secondPair[1]) {
            $this->x1 = $firstPair[0];
            $this->y1 = $firstPair[1];
            $this->x2 = $secondPair[0];
            $this->y2 = $secondPair[1];

            $this->id = self::$id++;
        }

    }
}
