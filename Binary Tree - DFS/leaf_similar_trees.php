<?php

class Solution {

    private function getTreeLeafValues($node, &$leaves)
    {
        if ($node === null) {
            return;
        }

        if ($node->left === null && $node->right === null) {
            $leaves[] = $node->val;
        }

        $this->getTreeLeafValues($node->left, $leaves);
        $this->getTreeLeafValues($node->right, $leaves);
    }

    public function leafSimilar($root1, $root2)
    {
        $leaves1 = [];
        $leaves2 = [];

        $this->getTreeLeafValues($root1, $leaves1);
        $this->getTreeLeafValues($root2, $leaves2);

        return $leaves1 === $leaves2;
    }
}

$solution = new Solution();
$result = $solution->leafSimilar([3,5,1,6,2,9,8,null,null,7,4], [3,5,1,6,7,4,2,null,null,null,null,null,null,9,8]);
echo $result? "ture" : "false";
