<?php

namespace aoc2021;

class Map
{
    public $map;
    public $lowestPoints;

    function __construct($input)
    {
        $arr = preg_split('/\n/', $input);
        foreach ($arr as &$row) {
            $row = str_split($row);
        }

        $this->map = $arr;

        self::findLowPoints();
        self::setupFirst();

        self::checker();


    }

    public function findAdjacentSquareValues($x, $y)
    {
        $values = [];

        $values['up'] = $this->map[$y-1][$x];
        $values['right'] = $this->map[$y][$x+1];
        $values['down'] = $this->map[$y+1][$x];
        $values['left'] = $this->map[$y][$x-1];

        return $values;
    }

    public function currentValue($x, $y)
    {
        return $this->map[$y][$x];
    }

    public function pr()
    {
        print_r(PHP_EOL);
        foreach ($this->map as $row) {
            print_r(implode($row));
            print_r(PHP_EOL);
        }
        print_r(PHP_EOL);
    }

    public function isLow($x, $y)
    {
        $adj = $this->findAdjacentSquareValues($x, $y);
        foreach ($adj as $value) {
            if (isset($value)) {
                if ($this->currentValue($x, $y) >= $value) {
                    return false;
                }
            }
        }
        return true;
    }

    public function findLowPoints()
    {
        $res = 0;
        foreach ($this->map as $yKey => $row) {
            foreach ($row as $xKey => $value) {
                if ($this->isLow($xKey, $yKey)) {
                    $this->lowestPoints[] = new Point($xKey, $yKey, $this->map);
                    $res += $value +1;
                }
            }
        }

        return $res;
    }

    public function prX()
    {
        print_r(PHP_EOL);
        foreach ($this->map as $row) {
            print_r(implode(preg_replace('/9/', ' ', $row)));
            print_r(PHP_EOL);
        }
        print_r(PHP_EOL);
    }

    public function prLow()
    {
        print_r($this->lowestPoints);
    }

    public function findAdj($lp)
    {
        $toCheck = [];

        if ($this->inRange([$lp->x + 1, $lp->y])) {
            $toCheck[] = [$lp->x + 1, $lp->y];
        }

        if ($this->inRange([$lp->x, $lp->y + 1])) {
            $toCheck[] = [$lp->x, $lp->y + 1];
        }

        if ($this->inRange([$lp->x - 1, $lp->y])) {
            $toCheck[] = [$lp->x - 1, $lp->y];
        }

        if ($this->inRange([$lp->x, $lp->y - 1])) {
            $toCheck[] = [$lp->x, $lp->y - 1];
        }

        return $toCheck;
    }

    public function findAdjAsArray($array)
    {
        $result = [];
        $startValue = preg_split('/\;/', $array);

        $x = $startValue[0];
        $y = $startValue[1];

        if ($this->inRange([$x + 1, $y])) {
            $result[] = $this->arrayToString([$x + 1, $y]);
        }

        if ($this->inRange([$x, $y + 1])) {
            $result[] = $this->arrayToString([$x, $y + 1]);
        }

        if ($this->inRange([$x - 1, $y])) {
            $result[] = $this->arrayToString([$x - 1, $y]);
        }

        if ($this->inRange([$x, $y - 1])) {
            $result[] = $this->arrayToString([$x, $y - 1]);
        }

        return $result;
    }

    public function checker()
    {
        foreach ($this->lowestPoints as $lp) {
            while (!empty($lp->notChecked)) {

                $current = $lp->notChecked[0];
                $lp->notChecked = array_merge($lp->notChecked, $this->findAdjAsArray($current));
                $lp->checked[] = $current;


                foreach ($lp->checked as $checkedValue) {
                    $key = array_search($checkedValue, $lp->notChecked);

                    if ($key !== false) {
                        unset($lp->notChecked[$key]);
                    }
                }

                sort($lp->notChecked);
                $lp->checked = array_unique($lp->checked);
                $lp->notChecked = array_unique($lp->notChecked);
            }
        }
    }

    public function basin()
    {
        foreach ($this->lowestPoints as $point) {
            // print_r($point);
            $next = $this->move($point, 'r');

            // print_r($next);
            die();
        }

        /**
         * algus: lowest point koos koordinaatidega. paneme selle kirja uue kaardina
         * liigume 1 võrra paremale: kas on 9 või !isset()? järelikult sein
         * proovime liikuda alla
         * kui ei ole sein: paneme koha kirja.
         * 0,1: väärtus 1
         * liigu 0,2 ? sein, eelmine 0,1
         * keera 90 (alla)
         * liigu 1,1 ? sein, eelmine 0,1
         * keera 90 (vasakule)
         * liigu 0,0 ? ok, väärtus 2, eelmine 0,1
         * keera -90 (alla)
         * liigu 0,1 ? ok, väärtus 3, eelmine 0,0
         * keera -90 (paremale)
         * liigu 1,1 ? sein, eelmine 0,1
         * keera 90 (alla)
         * liigu 0,2 ? sein, eelmine 0,1
         * keera 90 (vasakule)
         * liigu -1,1 ? sein, eelmine 0,1
         * keera 90 üles
         * liigu 0,0 ? ok, väärtus 2, eelmine 0,1
         * keera -90 (vasakule)
         * liigu -1,0 ? sein, eelmine 0,0
         * keera 90 (üles)
         * liigu 0,-1 ? sein, eelmine 0,0
         * keera 90 (paremale)
         * liigu 0,1 ? käidud!
         */ 


        /**
         * alustame algusest
         * 0,1: kas mul on naabrid? jep, 0,0. 0,1: käidud
         * 0,0: kas mul on naabrid? jep, 1,0. 0,0 käidud
         * 1,0: kas mul on naabrid? ei
         * mis veel käimata on? kõik
         */ 

        /**
         * low 2,2, val 5
         * kas mul on naabreid? 3,2, 2,3, 1,2 2,1. 2,2 käidud
         * 3,2 kas mul on käimata naabreid? 4,2 , 3,3, (2,2), 3,1
        */

    }

    public function inRange($arr)
    {
        if ($this->map[$arr[1]][$arr[0]] == 9) {
            return false;
        }
        if (!isset($this->map[$arr[1]][$arr[0]])) {
            return false;
        }
        return true;
    }

    public function setupFirst()
    {
        foreach ($this->lowestPoints as $lowPoint) {
            $lowPoint->notChecked[] = $lowPoint->x . ';' . $lowPoint->y;
        }
    }

    public function arrayToString($array)
    {
        return implode(';', $array);
    }

    public function getScore()
    {
        $hs = [];
        foreach ($this->lowestPoints as $lp) {
            $hs[] = count($lp->checked);
        }

        rsort($hs);
        return $hs[0] * $hs[1] * $hs[2];
    }

}