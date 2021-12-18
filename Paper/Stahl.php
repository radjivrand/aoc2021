<?php

namespace aoc2021;

class Stahl
{
    public $sheet;
    public $rules;
    public $xMax;
    public $yMax;
    public $mirroredSheet;
    
    function __construct($input)
    {
        $arr = preg_split('/\n\n/', $input);

        $values = preg_split('/\n/', $arr[0]);
        $this->rules = preg_split('/\n/', $arr[1]);

        $this->sheet = [];

        foreach ($values as $key => $value) {
            $coords = preg_split('/,/', $value);
            $this->sheet[$coords[1]][$coords[0]] = '#';
        }

        unset($this->rules[2]);

        foreach ($this->rules as &$rule) {
            $r = preg_split('/fold along /', $rule);
            $rule = preg_split('/=/', $r[1]);
        }

        $this->findSize();
        // $this->output($this->sheet);
        // sort($this->sheet);

        // $res = $this->mirror($this->rules[0], $this->sheet);

        // print_r('first' . PHP_EOL);
        // print_r($res);
        // $this->output($res);

        // $res = $this->mirror($this->rules[1], $res);

        // print_r($res);

        $this->getFolding();

        // print_r($this->getScore($this->sheet));

        $this->output($this->sheet);
        // print_r($this);
        print_r(PHP_EOL);
    }

    public function output($array)
    {
        for ($i=0; $i <= $this->yMax; $i++) { 
            for ($j=0; $j <= $this->xMax; $j++) { 
                print_r(isset($array[$i][$j]) ? '#' : '.');
            }
            print_r(PHP_EOL);
        }
    }

    public function findSize()
    {
        $xMax = 0;
        $yMax = 0;
        foreach ($this->sheet as $yKey => $row) {
            $yMax = $yKey > $yMax ? $yKey : $yMax;
            foreach ($row as $xKey => $value) {
                $xMax = $xKey > $xMax ? $xKey : $xMax;
            }
        }
        $this->xMax = $xMax;
        $this->yMax = $yMax;
    }

    public function mirror($rules, $array)
    {
        $dir = $rules[0];
        $loc = $rules[1];

        $m = $array;

        if ($dir == 'y') {
            for ($i = 1; $i <= $loc; $i++) {
                if (isset($m[$loc + $i])) {
                    if (!isset($m[$loc - $i])) {
                        $m[$loc - $i] = $m[$loc + $i];
                    } else {
                        $m[$loc - $i] = $m[$loc - $i] + $m[$loc + $i];
                    }
                }
                unset($m[$loc + $i]);
            }
        } else {
            foreach ($m as &$row) {
                for ($i = 1; $i <= $loc; $i++) {
                    if (isset($row[$loc + $i])) {
                        $row[$loc - $i] = $row[$loc + $i];
                    }
                }
            }

            for ($i=$loc; $i <= $this->xMax; $i++) { 
                foreach ($m as &$row) {
                    unset($row[$i]);
                }
            }
        }
        return $m;
    }

    public function getScore($array)
    {
        $score = 0;
        foreach ($array as $val) {
            // print_r($val);
            // print_r(PHP_EOL);
            $score += count($val);

            // print_r('score: ' . $score . PHP_EOL);
        }
        return $score;
    }

    public function getFolding()
    {
        foreach ($this->rules as $rule) {
            $this->sheet = $this->mirror($rule, $this->sheet);
            $this->findSize();
        }
    }
}