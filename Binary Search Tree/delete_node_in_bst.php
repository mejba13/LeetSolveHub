<?php

class Solution {

    function deleteNode($root, $key) {
        if ($root === null) {
            return null;
        }
        if ($key < $root->val) {
            $root->left = $this->deleteNode($root->left, $key);
        } elseif ($key > $root->val) {
            $root->right = $this->deleteNode($root->right, $key);
        } else {
            if ($root->left === null) {
                return $root->right;
            } elseif ($root->right === null) {
                return $root->left;
            }

            $successor = $this->getMin($root->right);
            $root->val = $successor->val; // Replace value
            $root->right = $this->deleteNode($root->right, $successor->val);
        }

        return $root;
    }

    private function getMin($node) {
        while ($node->left !== null) {
            $node = $node->left;
        }
        return $node;
    }
}
