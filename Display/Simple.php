<?PHP

namespace aoc2021;

class Simple
{
    public $variants;
    function __construct($input)
    {
        $input = trim($input);
        $input = preg_split('/\n/', $input);
        foreach ($input as $value) {
            $this->variants[] = new Combination($value);
        }
    }

    public function print($input) {
        return print_r($input.PHP_EOL);
    }

    public function countEasySegments()
    {
        $counter = 0;
        foreach ($this->variants as $variant) {
            $counter += $this->countOneSegment($variant->segments);
        }

        return $counter;
    }

    public function countOneSegment($segment)
    {
        $counter = 0;
        foreach ($segment as $value) {
            $l = strlen($value);
            $counter += ($l == 2 || $l == 3 || $l == 4 || $l == 7) ? 1 : 0;
        }
        print_r($segment);
        print_r(PHP_EOL);
        print_r($counter);
        print_r(PHP_EOL);

        return $counter;
    }

}