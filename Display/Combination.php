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

    function __construct($input)
    {
        $splitted = preg_split('/\|/', $input);
        $this->cables = preg_split('/\ /', trim($splitted[0]));
        $this->segments = preg_split('/\ /', trim($splitted[1]));
        $this->mixed = array_unique(array_merge($this->cables, $this->segments));
        self::mapCables();

    }

    public function mapCables()
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

            if ($this->doesItFit($this->one, $this->seven)) {
                print_r('it does fit');
                print_r(PHP_EOL);
                print_r($this->one);
                print_r(PHP_EOL);
                print_r($this->seven);
                print_r();
                print_r(PHP_EOL);

                $this->aaa = $this->findExcessChars($this->one, $this->seven);
            }


            if (strlen($value) == 5) {
            }

        }
    }

    /**
     * loogika võiks olla midagi sellist:
     * kui on olemas kahekohaline ja kolmekohaline, siis on olemas meil ülemine segment 1 vs 7
     * 1: 2 kohta, unikaalne
     * 7: 3 kohta, unikaalne
     * 4: 4 kohta, unikaalne
     * 8: 7 kohta, unikaalne
     * 3: 5 kohta, sisaldab: 1, 7
     * 2: 5 kohta, ei sisalda: 1, 7
     * 5: 5 kohta, ei sisalda: 1, 7
     * 9: 6 kohta, sisaldab endas 1, 4, 7
     * 6: 6 kohta, sisaldab endas: X, ei sisalda: 1, 4, 7
     * 0: 6 kohta, sisaldab endas: 1, 7; ei sisalda: 4
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
            if (!strpos($large, $value)) {
                return false;
            }
        }
        return true;
    }

    public function findExcessChars($small, $large)
    {
        $res = array_diff(str_split($large), str_split($small));

        // print_r(str_split($res));
        // print_r(str_split($large));
        return implode($res);
    }
}
