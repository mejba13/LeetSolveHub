<?php

class Solution {

    function lowestCommonAncestor($root,$p, $q) {
        if($root == null || $root == $p || $root == $q) {
            return $root;
        }

        $left = $this->lowestCommonAncestor($root->left, $p, $q);
        $right = $this->lowestCommonAncestor($root->right, $p, $q);

        if($left != null && $right != null) {
            return $root;
        }

        return $left != null ? $left : $right;
    }
}