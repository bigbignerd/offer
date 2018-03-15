<?php
/**
 * 二叉树
 */
class Node
{
	public $value;
	public $left;
	public $right;

	public function __construct($value,$left,$right)
	{
		$this->value = $value;
		$this->left  = null;
		$this->right = null;
	}

}
class Tree
{
	public $root = null;
	//插入新的节点
	public function insert($value)
	{
		$this->root = $this->insertNode($this->root, $value);
	}
	private function insertNode($node, $value)
	{
		if($node == null){
			return new Node($value, null, null);
		}
		//插入左子树
		if($node->value >= $value){
			$node->left = $this->insertNode($node->left, $value);
		}else{
		//插入右子树
			$node->right = $this->insertNode($node->right, $value);
		}
		return $node;
	}
	//先序遍历
	public function preOrder()
	{
		if($this->root == null){
			return false;
		}
		$this->preOrderPrint($this->root);
	}
	private function preOrderPrint($node)
	{
		if($node !== null){
			printf("%d\t", $node->value);
			$this->preOrderPrint($node->left);
			$this->preOrderPrint($node->right);
		}
	}
}
?>