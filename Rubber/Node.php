<?php

namespace aoc2021\Rubber;

class Node
{
    public $left;
    public $right;
    public $val;
    public $level;


    function __construct($val)
    {
        $this->val = $val;
        $this->left = null;
        $this->right = null;
        $this->level = 0;
        // code...
    }

    public function printDepthFirst($rootNode) {
        if (empty($rootNode)) {
            return [];
        }

        $leftValues = $this->printDepthFirst($rootNode->left);
        $rightValues = $this->printDepthFirst($rootNode->right);
        return [$rootNode->val, ...$leftValues, ...$rightValues];
    }
}
