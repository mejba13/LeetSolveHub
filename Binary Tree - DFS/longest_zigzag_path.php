<?php

class Solution{

    private $maxZigzag = 0;

    function longestZigZag($root){
        $this->dfs($root, true, 0);
        $this->dfs($root, false, 0);
        return $this->maxZigzag;
    }

    private function dfs($node, $isLeft, $length)
    {
        if($node === null){
            return;
        }

        $this->maxZigzag = max($this->maxZigzag, $length);

        if($isLeft) {
            $this->dfs($node->left, false, $length + 1);
            $this->dfs($node->right, true, 1);
        } else {
            $this->dfs($node->right, true, $length + 1);
            $this->dfs($node->left, false, 1);

        }
    }
}