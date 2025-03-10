<?php

class Solution {

    /**
     * Definition for a binary tree node.
     * class TreeNode {
     *     public $val = null;
     *     public $left = null;
     *     public $right = null;
     *     function __construct($val = 0, $left = null, $right = null) {
     *         $this->val = $val;
     *         $this->left = $left;
     *         $this->right = $right;
     *     }
     * }
     */

    function searchBST($root, $val) {

        if ($root === null || $root->val === $val) {
            return $root;
        }

        if($val < $root->val) {
            return $this->searchBST($root->left, $val);
        } else {
            return $this->searchBST($root->right, $val);
        }
    }
}