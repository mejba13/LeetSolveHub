<?php


class Solution
{
    // Main method to calculate path sums
    function pathSum($root, $targetSum)
    {
        // Initialize prefix sums with base case
        $prefixSums = [0 => 1];
        return $this->dfs($root, 0, $targetSum, $prefixSums);
    }

    // Helper method for DFS traversal
    private function dfs($node, $currentSum, $targetSum, &$prefixSums)
    {
        if ($node === null) {
            return 0;
        }

        // Update current sum
        $currentSum += $node->val;

        // Count the number of paths that end at this node
        $pathCount = $prefixSums[$currentSum - $targetSum] ?? 0;

        // Add the current sum to prefix sums
        $prefixSums[$currentSum] = ($prefixSums[$currentSum] ?? 0) + 1;

        // Recur for left and right subtrees
        $pathCount += $this->dfs($node->left, $currentSum, $targetSum, $prefixSums);
        $pathCount += $this->dfs($node->right, $currentSum, $targetSum, $prefixSums);

        // Remove the current sum from the prefix sums (backtrack to parent node)
        $prefixSums[$currentSum] -= 1;

        return $pathCount;
    }
}

// Example usage
class TreeNode
{
    public $val;
    public $left;
    public $right;

    public function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

// Create example tree
$root = new TreeNode(10);
$root->left = new TreeNode(5);
$root->right = new TreeNode(-3);
$root->left->left = new TreeNode(3);
$root->left->right = new TreeNode(2);
$root->right->right = new TreeNode(11);
$root->left->left->left = new TreeNode(3);
$root->left->left->right = new TreeNode(-2);
$root->left->right->right = new TreeNode(1);

$solution = new Solution();
echo $solution->pathSum($root, 8); // Output: 3
