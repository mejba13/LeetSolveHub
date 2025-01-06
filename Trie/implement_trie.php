<?php

class TrieNode {
    public $children;
    public $isEnd;

    public function __construct() {
        $this->children = [];
        $this->isEnd = false;
    }
}

class Trie {
    private $root;

    public function __construct() {
        $this->root = new TrieNode();
    }

    /**
     * Inserts a word into the Trie.
     * @param String $word
     * @return NULL
     */
    public function insert($word) {
        $node = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
            $char = $word[$i];
            if (!isset($node->children[$char])) {
                $node->children[$char] = new TrieNode();
            }
            $node = $node->children[$char];
        }
        $node->isEnd = true;
    }

    /**
     * Returns true if the word exists in the Trie.
     * @param String $word
     * @return Boolean
     */
    public function search($word) {
        $node = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
            $char = $word[$i];
            if (!isset($node->children[$char])) {
                return false;
            }
            $node = $node->children[$char];
        }
        return $node->isEnd;
    }

    /**
     * Returns true if there is any word in the Trie that starts with the given prefix.
     * @param String $prefix
     * @return Boolean
     */
    public function startsWith($prefix) {
        $node = $this->root;
        for ($i = 0; $i < strlen($prefix); $i++) {
            $char = $prefix[$i];
            if (!isset($node->children[$char])) {
                return false;
            }
            $node = $node->children[$char];
        }
        return true;
    }
}

// Example Usage:
$trie = new Trie();
$trie->insert("apple");
echo $trie->search("apple") ? "true\n" : "false\n"; // Output: true
echo $trie->search("app") ? "true\n" : "false\n";   // Output: false
echo $trie->startsWith("app") ? "true\n" : "false\n"; // Output: true
$trie->insert("app");
echo $trie->search("app") ? "true\n" : "false\n";   // Output: true
