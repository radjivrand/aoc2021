<?php

namespace aoc2021;

class Dumbo
{
    static $counter = 0;
    static $roundNumber = 0;

    public function __construct($input)
    {
        $arr = preg_split('/\n/', $input);
        foreach ($arr as &$row) {
            $row = str_split($row);
        }

        $this->map = $arr;

        $this->makeRounds(400);
        $this->output($this->map);


        print_r(self::$counter . PHP_EOL);
    }

    public function output()
    {
        print_r(PHP_EOL);
        foreach ($this->map as $row) {
            print_r(implode($row) . PHP_EOL);
        }
        print_r(PHP_EOL);
    }

    public function increase()
    {
        foreach ($this->map as &$row) {
            foreach ($row as $key => &$value) {
                $value = $value  == 9 ? 'X' : $value +=1;
            }
        }
    }

    public function flash()
    {
        $previousRound = self::$counter;
        do {
            $flashed = false;
            foreach ($this->map as $yKey => $row) {
                foreach ($row as $xKey => $value) {
                    if ($this->map[$yKey][$xKey] == 'X') {
                        $this->incAdjacent($xKey, $yKey);
                        self::$counter ++;
                        $this->map[$yKey][$xKey] = '-';
                        $flashed = true;
                    }
                }
            }
        } while ($flashed != false);

        // print_r('after flash' . PHP_EOL);
        // $this->output($this->map);
        $currentRound = self::$counter;

        foreach ($this->map as $yKey => $row) {
            foreach ($row as $xKey => $value) {
                // print_r($this->map[$yKey][$xKey] . PHP_EOL);
                if ($value == '-') {
                    $this->map[$yKey][$xKey] = 0;
                }
            }
        }


        self::$roundNumber ++;

        if (($currentRound - $previousRound) == 100) {
            print_r(self::$roundNumber);
            print_r(PHP_EOL);
            // print_r(var_dump());
            die();
        }
    }

    public function incAdjacent($x, $y)
    {
        if (
            isset($this->map[$y-1][$x-1])
            && is_int($this->map[$y-1][$x-1])
            && $this->map[$y-1][$x-1] != 0
        ) {
            $this->map[$y-1][$x-1] ++;
            $this->map[$y-1][$x-1] = $this->map[$y-1][$x-1] == 10 ? 0 : $this->map[$y-1][$x-1];
        }

        if (
            isset($this->map[$y-1][$x])
            && is_int($this->map[$y-1][$x])
            && $this->map[$y-1][$x] != 0
        ) {
            $this->map[$y-1][$x] ++;
            $this->map[$y-1][$x] = $this->map[$y-1][$x] == 10 ? 0 : $this->map[$y-1][$x];
        }

        if (
            isset($this->map[$y-1][$x+1])
            && is_int($this->map[$y-1][$x+1])
            && $this->map[$y-1][$x+1] != 0
        ) {
            $this->map[$y-1][$x+1] ++;
            $this->map[$y-1][$x+1] = $this->map[$y-1][$x+1] == 10 ? 0 : $this->map[$y-1][$x+1];
        }

        if (
            isset($this->map[$y][$x-1])
            && is_int($this->map[$y][$x-1])
            && $this->map[$y][$x-1] != 0
        ) {
            $this->map[$y][$x-1] ++;
            $this->map[$y][$x-1] = $this->map[$y][$x-1] == 10 ? 0 : $this->map[$y][$x-1];
        }

        if (
            isset($this->map[$y][$x+1])
            && is_int($this->map[$y][$x+1])
            && $this->map[$y][$x+1] != 0
        ) {
            $this->map[$y][$x+1] ++;
            $this->map[$y][$x+1] = $this->map[$y][$x+1] == 10 ? 0 : $this->map[$y][$x+1];
        }

        if (
            isset($this->map[$y+1][$x-1])
            && is_int($this->map[$y+1][$x-1])
            && $this->map[$y+1][$x-1] != 0
        ) {
            $this->map[$y+1][$x-1] ++;
            $this->map[$y+1][$x-1] = $this->map[$y+1][$x-1] == 10 ? 0 : $this->map[$y+1][$x-1];
        }

        if (
            isset($this->map[$y+1][$x])
            && is_int($this->map[$y+1][$x])
            && $this->map[$y+1][$x] != 0
        ) {
            $this->map[$y+1][$x] ++;
            $this->map[$y+1][$x] = $this->map[$y+1][$x] == 10 ? 0 : $this->map[$y+1][$x];
        }

        if (
            isset($this->map[$y+1][$x+1])
            && is_int($this->map[$y+1][$x+1])
            && $this->map[$y+1][$x+1] != 0
        ) {
            $this->map[$y+1][$x+1] ++;
            $this->map[$y+1][$x+1] = $this->map[$y+1][$x+1] == 10 ? 0 : $this->map[$y+1][$x+1];
        }
    }

    public function makeRounds($number)
    {
        for ($i=0; $i < $number; $i++) { 
            $this->increase();
            $this->flash();
        }
    }
}
