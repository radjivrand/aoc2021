<?php

namespace aoc2021;

use aoc2021\Line;
/**
 * 
 */
class Grid
{
    public $lines;
    public $paper = [];

    function __construct()
    {
        $lines = [];
    }

    public function addLine(Line $line)
    {
        if (!empty($line->id)) {
            $this->lines[] = $line;
        }
    }

    public function drawLinesHorVer()
    {
        foreach ($this->lines as $line) {
            // print_r($line);
            if ($line->x1 == $line->x2) {
                if ($line->y2 >= $line->y1) {
                    print_r('1' . PHP_EOL);
                    for ($i=$line->y1; $i <= $line->y2; $i++) { 
                        $this->paper[$line->x1][$i]++;
                    }
                } else {
                    print_r('2' . PHP_EOL);
                    // print_r($line);
                    for ($j=$line->y2; $j <= $line->y1; $j++) { 
                        $this->paper[$line->x1][$j]++;
                    }
                }
            } else {
                print_r('hello?');
                if ($line->x2 >= $line->x1) {
                    print_r('3' . PHP_EOL);
                    for ($k=$line->x1; $k <= $line->x2; $k++) { 
                        $this->paper[$k][$line->y1]++;
                    }
                } else {
                    print_r('4' . PHP_EOL);
                    for ($l=$line->x2; $l <= $line->x1; $l++) { 
                        $this->paper[$l][$line->y1]++;
                    }
                }
            }
        }
    }

    public function drawLines()
    {
        foreach ($this->lines as $line) {
            $xValues = [];
            $yValues = [];

            if ($line->deltaX != 0) {
                $xValues = range($line->x1, $line->x2);
            }

            if ($line->deltaY != 0) {
                $yValues = range($line->y1, $line->y2);
            }

            if (empty($xValues)) {
                $xValues = array_fill(0, count($yValues), $line->x1);
            }

            if (empty($yValues)) {
                $yValues = array_fill(0, count($xValues), $line->y1);
            }

            foreach ($xValues as $key => $value) {
                $this->paper[$xValues[$key]][$yValues[$key]]++;
            }
        }
    }


    public function getPaperSize()
    {
        $maxX = 0;
        $maxY = 0;
        foreach ($this->paper as $yKey => $values) {
            $maxY = $yKey > $maxY ? $yKey : $maxY;
            foreach ($values as $xKey => $value) {
                $maxX = $xKey > $maxX ? $xKey : $maxX;
            }
        }
        return [$maxY, $maxX];
    }

    public function printPaper()
    {
        $printedPaper = [];

        $size = $this->getPaperSize();

        for ($y=0; $y <= $size[1]; $y++) { 
            for ($x=0; $x <=$size[0]; $x++) {
                    print_r(' ');
                    print_r( $this->paper[$x][$y] ?? '.');
            }
            print_r(PHP_EOL);
        }
    }

    public function getScore()
    {
        $counter = 0;

        $size = $this->getPaperSize();

        for ($y=0; $y <= $size[1]; $y++) { 
            for ($x=0; $x <=$size[0]; $x++) {
                $counter += $this->paper[$x][$y] >= 2 ? 1 : 0;
            }
        }

        return $counter;
    }

}