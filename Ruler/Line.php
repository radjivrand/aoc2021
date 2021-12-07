<?php

namespace aoc2021;

class Line
{
    public $x1;
    public $y1;
    public $x2;
    public $y2;
    public $deltaX;
    public $dirX;
    public $deltaY;
    public $dirY;
    public static $id = 1;

    public function __construct(string $input)
    {
        $pairs = preg_split('/\s\-\>\s/', $input);
        $firstPair = preg_split('/\,/', $pairs[0]);
        $secondPair = preg_split('/\,/', $pairs[1]);

        $this->x1 = (int)$firstPair[0];
        $this->y1 = (int)$firstPair[1];
        $this->x2 = (int)$secondPair[0];
        $this->y2 = (int)$secondPair[1];

        $this->deltaX = $this->x2 - $this->x1;
        $this->deltaY = $this->y2 - $this->y1;

        $this->dirX = $this->deltaX == 0 ? 0 : $this->deltaX / abs($this->deltaX);
        $this->dirY = $this->deltaY == 0 ? 0 : $this->deltaY / abs($this->deltaY);

        $this->id = self::$id++;

    }
}
