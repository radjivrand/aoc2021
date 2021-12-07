<?php

namespace aoc2021;

class Card
{
    public $field;
    public $cardNo;
    public static $no = 0;

    public function __construct($inputArray)
    {
        $this->cardNo = self::$no++;

        $row = preg_split('/\n/', $inputArray);

        $this->field = $row;

        foreach ($this->field as &$row) {
            $row = preg_split('/\s+/', trim($row));
        }

    }


    public function mark($number)
    {
        foreach ($this->field as $fieldKey => $row) {
            foreach ($row as $valueKey => &$value) {
                if ($value == $number) {
                    $this->field[$fieldKey][$valueKey] = 100; 
                    break 2;
                }
            }
        }
    }

    public function checkForWin()
    {
        foreach ($this->field as $row) {
            if (array_sum($row) == 500) {
                return true;
            }
        }

        foreach ($this->field as $key => $row) {
            if (array_sum(array_column($this->field, $key)) == 500) {
                return true;
            }
        }

        return false;
    }

    public function output()
    {
        foreach ($this->field as $key => $value) {
            foreach ($value as $no) {
                echo $no > 9 ? '  ' . $no : '  ' . $no;
            }
            echo PHP_EOL;
        }
        echo PHP_EOL;
    }

    public function getScore()
    {
        $sum = 0;
        foreach ($this->field as $row) {
            foreach ($row as $value) {
                $sum += $value < 100 ? $value : 0;
            }

        }

        return $sum;
    }

}
