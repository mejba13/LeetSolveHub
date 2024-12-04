<?php

class Solution {

    function rightSideView($root) {

        if ($root === null) return [];

        $queue = [$root];
        $rightSide = [];

        while (!empty($queue)) {
            $levelSize = count($queue);

            for ($i = 0; $i < $levelSize; $i++) {

                $node = array_shift($queue);

                if ($i === $levelSize - 1) {
                    $rightSide[] = $node->val;
                }
                if ($node->left !== null) {
                    $queue[] = $node->left;
                }
                if ($node->right !== null) {
                    $queue[] = $node->right;
                }
            }
        }
        return $rightSide;
    }
}