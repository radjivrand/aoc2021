<?php

namespace aoc2021;

class Combination
{
    public $cables;
    public $segments;
    public $mixed;
    public $aaa;
    public $bbb;
    public $ccc;
    public $ddd;
    public $eee;
    public $fff;
    public $ggg;
    public $one;
    public $two;
    public $three;
    public $four;
    public $five;
    public $six;
    public $seven;
    public $eight;
    public $nine;
    public $zero;
    public $decodedValue;

    function __construct($input)
    {
        $splitted = preg_split('/\|/', $input);
        $this->cables = preg_split('/\ /', trim($splitted[0]));
        $this->segments = preg_split('/\ /', trim($splitted[1]));
        $arr = array_merge($this->cables, $this->segments);

        foreach ($arr as &$value) {
            $value = $this->sortString($value);
        }
        sort($arr);

        $this->mixed = array_unique($arr);
        self::mapCablesInit();
        // self::checkFitting();
        self::decode();
    }

    public function mapCablesInit()
    {
        foreach ($this->mixed as $value) {
            switch (strlen($value)) {
                case 2:
                    $this->one = $value;
                    break;
                case 3:
                    $this->seven = $value;
                    break;
                case 4:
                    $this->four = $value;
                    break;
                case 7:
                    $this->eight = $value;
                    break;
                default:
                    break;
            }
        }

        foreach ($this->mixed as $value) {
            switch (strlen($value)) {
                case 5:
                    if (empty($this->three) && $this->doesItFit($this->seven, $value)) {
                        $this->three = $value;
                    }
                    break;
                case 6:
                    if (empty($this->zero) && $this->doesItFit($this->seven, $value) && !$this->doesItFit($this->four, $value)) {
                        $this->zero = $value;
                    } elseif (empty($this->six) && !$this->doesItFit($this->seven, $value) && !$this->doesItFit($this->four, $value)) {
                        $this->six = $value;
                    } else {
                        if (empty($this->nine)) {
                            $this->nine = $value;
                        }
                    }
                    break;
                default:
                    break;
            }
        }

        $this->aaa = $this->findExcessChars($this->one, $this->seven);
        $firstG = $this->findExcessChars($this->four, $this->nine);
        $this->ggg = $this->findExcessChars($this->aaa, $firstG);
        $this->bbb = $this->findExcessChars($this->three, $this->nine);
        $this->eee = $this->findExcessChars($this->nine, $this->eight);
        $this->ccc = $this->findExcessChars($this->six, $this->eight);
        $this->ddd = $this->findExcessChars($this->zero, $this->eight);
        $this->fff = $this->findExcessChars($this->ccc, $this->one);

        $this->two = $this->sortString($this->aaa . $this->ccc . $this->ddd . $this->eee . $this->ggg);
        $this->five = $this->sortString($this->aaa . $this->bbb . $this->ddd . $this->fff . $this->ggg);
    }

    public function decode()
    {
        $table = [
            $this->one => 1,
            $this->two => 2,
            $this->three => 3,
            $this->four => 4,
            $this->five => 5,
            $this->six => 6,
            $this->seven => 7,
            $this->eight => 8,
            $this->nine => 9,
            $this->zero => 0
        ];

        $result = '';

        foreach ($this->segments as $segment) {
            $result .= $table[$this->sortString($segment)];
        }

        $this->decodedValue = $result;
    }

    /**
     * loogika võiks olla midagi sellist:
     * kui on olemas kahekohaline ja kolmekohaline, siis on olemas meil ülemine segment 1 vs 7
     * 1: 2 kohta, unikaalne
     * 7: 3 kohta, unikaalne
     * 4: 4 kohta, unikaalne
     * 8: 7 kohta, unikaalne
     * 3: 5 kohta, sisaldab: 7
     * 2: 5 kohta, ei sisalda: 7
     * 5: 5 kohta, ei sisalda: 7
     * 9: 6 kohta, sisaldab endas 4, 7, 3
     * 6: 6 kohta, sisaldab endas: X, ei sisalda: 4, 7
     * 0: 6 kohta, sisaldab endas: 7; ei sisalda: 4
     * 
     * 1: leiame unikaalsed
     * 2: jaotame kohtade kaupa
     * 3: selgitame nt 6kohalised
     * 
     * 
     * gcf
     * dcaebfg
     */ 

    public function doesItFit($small, $large)
    {
        if (empty($small) || empty($large)) {
            return false;
        }

        foreach (str_split($small) as $value) {
            if (strpos($large, $value) === false) {
                return false;
            }
        }

        return true;
    }

    public function findExcessChars($small, $large)
    {
        $res = array_diff(str_split($large), str_split($small));
        return implode($res);
    }

    public function sortString($string)
    {
        $a = str_split($string);
        sort($a);
        return implode($a);
    }
}
