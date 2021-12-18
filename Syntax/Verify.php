<?php

namespace aoc2021;

class Verify
{
    public $code;

    public $halves;
    const REWARD = [
        ')' => 3,
        ']' => 57,
        '}' => 1197,
        '>' => 25137,
    ];

    const MIDDLE = [
        '(' => 1,
        '[' => 2,
        '{' => 3,
        '<' => 4,
    ];


    function __construct($input)
    {
        $arr = preg_split('/\n/', $input);
        foreach ($arr as &$row) {
            $row = str_split($row);
        }

        $this->code = $arr;

        // print_r($this->code);

        // $this->processRows();
        // print_r($this->code);
    }

    public function eliminatePairs($row)
    {
        $previous = -1;
        do {
            $found = false;
            foreach ($row as $key => &$value) {
                switch ($row[$previous] . $value) {
                    case '<>':
                    case '()':
                    case '{}':
                    case '[]':
                        unset($row[$previous]);
                        unset($row[$key]);
                        $found = true;
                        break;
                    default:
                        // code...
                        break;
                }

                $previous = $key;
            }

        } while ($found == true);
        return $row;
    }

    public function processRows()
    {
        $new = [];
        foreach ($this->code as &$rows) {
            $new[] = $this->eliminatePairs($rows);
        }

        $chars = '';

        foreach ($new as &$row) {
            foreach ($row as $key => $value) {
                switch ($value) {
                    case '>':
                    case ')':
                    case '}':
                    case ']':
                        $chars .= $value;
                        $row['marker'] = 1;
                        break 2;
                    
                    default:
                        break;
                }
            }

            if ($row['marker'] != 1) {
                unset($row['marker']);
                $this->halves[] = $row;
            }
        }

        return $chars;
    }

    public function getScore($string)
    {
        $res = 0;
        foreach (str_split($string) as $key => $value) {
            $res += self::REWARD[$value];
        }

        return $res;
    }

    public function getSecondScore()
    {
        print_r('äheelel');
        $scores = [];
        foreach ($this->halves as $row) {
            $current = 0;
            krsort($row);
            foreach ($row as $value) {
                $current *= 5;
                $current += self::MIDDLE[$value];
            }
            $scores[] = $current;
        }

        sort($scores);
        $len = count($scores);
        $pos = ($len - 1) / 2;

        return $scores[$pos];
    }



}