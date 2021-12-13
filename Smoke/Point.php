<?php

namespace aoc2021;

class Point
{
    
    public $x;
    public $y;
    public $value;
    public $checked;
    public $notChecked;

    function __construct($x, $y, $map)
    {
        $this->x = $x;
        $this->y = $y;
        $this->value = $map[$y][$x];
        $this->checked = [];
        $this->notChecked = [];
    }
}