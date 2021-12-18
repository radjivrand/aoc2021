<?php

namespace aoc2021;

class Jumbo
{
    public $map;

    function __construct($input)
    {
        $arr = preg_split('/\n/', $input);
        foreach ($arr as &$row) {
            $row = str_split($row);
        }

        $this->map = $arr;

        $this->increaseAll();
        // $this->increaseAll();
        // $this->increaseAroundMe(1,1);
        // $this->output($this->map);

        print_r('3, 0: ' . $this->inc(0, true));
    }

    public function getValue($x, $y)
    {
        return $this->map[$y][$x];
    }

    public function setValue($x, $y, $value)
    {
        $this->map[$y][$x] = $value;
    }

    public function output()
    {
        print_r(PHP_EOL);
        foreach ($this->map as $row) {
            print_r(implode($row) . PHP_EOL);
        }
        print_r(PHP_EOL);
    }

    public function increaseAroundMe($x, $y)
    {
        if (isset($this->map[$x-1]) && isset($this->map[$y-1])) {
            $this->map[$x-1][$y-1] = $this->inc($this->map[$x-1][$y-1], true);
        }
        if (isset($this->map[$y-1])) {
            $this->map[$x][$y-1] = $this->inc($this->map[$x][$y-1], true);
        }
        if (isset($this->map[$x+1]) && isset($this->map[$y-1])) {
            $this->map[$x+1][$y-1] = $this->inc($this->map[$x+1][$y-1], true);
        }
        if (isset($this->map[$x-1])) {
            $this->map[$x-1][$y] = $this->inc($this->map[$x-1][$y], true);
        }
        if (isset($this->map[$x+1])) {
            $this->map[$x+1][$y] = $this->inc($this->map[$x+1][$y], true);
        }
        if (isset($this->map[$x-1]) && isset($this->map[$y+1])) {
            $this->map[$x-1][$y+1] = $this->inc($this->map[$x-1][$y+1], true);
        }
        if (isset($this->map[$y+1])) {
            $this->map[$x][$y+1] = $this->inc($this->map[$x][$y+1], true);
        }
        if (isset($this->map[$x+1]) && isset($this->map[$y+1])) {
            $this->map[$x+1][$y+1] = $this->inc($this->map[$x+1][$y+1], true);
        }
    }

    public function increaseAll()
    {

        print_r('before' . PHP_EOL);
        $this->output($this->map);

        foreach ($this->map as &$row) {
            foreach ($row as $key => &$value) {
                $value = $this->inc($value, false); 
            }
        }
        // $this->flashAll();

        print_r('after' . PHP_EOL);
        $this->output($this->map);
    }

    public function inc($value, $flash)
    {
        if ($value == 9 || ($value == 0 && $flash)) {
            return 0;
        }

        return $value + 1;
    }

    public function flashAll()
    {
        foreach ($this->map as $yKey => &$row) {
            foreach ($row as $xKey => &$value) {
                if ($value == 0) {
                    $this->increaseAroundMe($xKey, $yKey);
                }
            }
        }
    }
}