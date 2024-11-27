<?php

class Solution {

    function maxDepth($root) {
        if($root === null) {
            return 0;
        }

        $leftDepth = $this->maxDepth($root->left);
        $rightDepth = $this->maxDepth($root->right);

        return 1 + max($leftDepth, $rightDepth);
    }
}

$solution = new Solution();
$solution->maxDepth([3,9,20,null,null,15,7]);