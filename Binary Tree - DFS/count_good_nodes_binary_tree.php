<?php

class Solution {

    function goodNodes($root) {
        return $this->dfs($root, PHP_INT_MIN);
    }

    private function dfs($node, $maxValue) {
        if($node === null) {
            return 0;
        }

        $isGood = $node->val >= $maxValue ? 1 : 0;
        $maxValue = max($maxValue, $node->val);

        return $isGood + $this->dfs($node->left, $maxValue) + $this->dfs($node->right, $maxValue);
    }
}