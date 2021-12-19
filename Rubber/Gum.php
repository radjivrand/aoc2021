<?php

namespace aoc2021;

class Gum
{
    public $start;
    public $cur;
    public $rules;

    function __construct($input)
    {
        $arr = preg_split('/\n\n/', trim($input));
        $this->start = str_split($arr[0]);
        $rules = preg_split('/\n/', $arr[1]);
        foreach ($rules as $rule) {
            $separated = preg_split('/ -> /', $rule);
            $this->rules[$separated[0]] = $separated[1];
        }

        $this->processCycles(25);
        $this->getScore();

        $a = 20;
        for ($i=0; $i < 40; $i++) { 
            $a += $a-1;
            // code...
        }
            // print_r($a . PHP_EOL);
        // print_r($this);

        // $this->findRelevant();
        // print_r(PHP_EOL);
    }

    public function insert($array)
    {
        $arr = $this->stretch($array);
        foreach ($arr as $key => $value) {
            if ($key != 0 && isset($arr[$key])) {
                $arr[$key - 1] = $this->rules[$arr[$key - 2] . $arr[$key]];
            }
        }
        return $arr;
    }

    public function stretch($array)
    {
        $newArr = [];
        foreach ($array as $key => $value) {
            array_push($newArr, $value);
            array_push($newArr, null);
        }
        return $newArr;
    }

    public function processCycles($number)
    {
        $this->cur = $this->start;
        for ($i=0; $i < $number; $i++) { 
            $this->cur = $this->insert($this->cur);
        }
    }

    public function getScore()
    {
        $result = array_count_values($this->cur);
        asort($result);
        print_r(end($result) - reset($result));
    }

    public function findRelevant(){
        print_r(array_count_values($this->rules));
    }
}