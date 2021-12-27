<?php

namespace aoc2021\Rubber;

use aoc2021\Rubber\Node as Node;

class Legs
{
    public $stack;


    function __construct()
    {
        print_r('hjello');
        $this->createStack();
        print_r($this);
    }

    public function createStack()
    {
        $this->stack = new Node(0);
    }
}