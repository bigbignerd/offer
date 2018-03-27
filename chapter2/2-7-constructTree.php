<?php
/**
 * 根据中序序列和先序序列重新构建二叉树
 * 思路：根据先序找到根节点，根据中序序列找到根节点的左子树和右子树，递归构建
 */
class Node
{
	public $data;
	public $left;
	public $right;

	public function __construct($data,$left,$right)
	{
		$this->data = $data;
		$this->left = $left;
		$this->right = $right;
	}
}

class ConstructTree
{
	public $root;

	public $preorder;
	public $inorder;

	public function constructByArr($preorder,$inorder)
	{
		if(empty($preorder) || empty($inorder)){
			return false;
		}
		$this->preorder = $preorder;
		$this->inorder  = $inorder;

		return $this->coreConstruct(0,count($this->preorder)-1,0,count($this->inorder)-1);
	}

	public function coreConstruct($preStart,$preEnd,$inStart,$inEnd)
	{
		//先序遍历第一个元素的值是根节点
		$rootVal  = $this->preorder[$preStart];
		$rootNode = new Node($rootVal,null,null);

		if($preStart == $preEnd){
			//到达叶子节点
			if($inStart == $inEnd && $this->preorder[$preStart] == $this->inorder[$inStart]){
				return $rootNode;
			}else{
				throw new Exception("序列不合法");
				exit;
			}
		}

		//中序遍历根节点左边的元素都是左子树、右边的都是右子树
		$rootIndex = $inStart;
		while($rootIndex <= $inEnd && $this->inorder[$rootIndex] !== $rootVal){
			$rootIndex++;
		}
		if($rootIndex == $inEnd && $this->inorder[$rootIndex] != $rootVal){
			throw new Exception("先序数列或中序数列有问题");
			exit;
		}

		//根据中序遍历计算得到的：左子树的元素个数
		$leftLength = $rootIndex - $inStart;
		//根据中序遍历计算得到的：右子树的元素个数
		$rightLength = $inEnd - $rootIndex;
		
		$leftEndIndex = $preStart + $leftLength;
		$rightStart = $rootIndex + 1;

		//分别构建左子树 与 右子树
		if($leftLength > 0){
			$rootNode->left = $this->coreConstruct($preStart + 1, $leftEndIndex,$inStart,$rootIndex - 1);
		}
		if($rightLength > 0){
			$rootNode->right = $this->coreConstruct($leftEndIndex+1, $preEnd, $rootIndex+1, $inEnd);
		}
		return $rootNode;
	}

	public function preOrder($node)
	{
		$root = $node->data;
		echo $root;
		if($node->left !== null){
			echo $this->preOrder($node->left);
		}
		if($node->right !== null){
			echo $this->preOrder($node->right);
		}
	}
	public function inOrder($node)
	{
		$root = $node->data;
		if($node->left != null){
			echo $this->inOrder($node->left);
		}
		echo $root;
		if($node->right != null){
			echo $this->inOrder($node->right);
		}
	}
}

$pre = [1,2,4,7,3,5,6,8];
$in  = [4,7,2,1,5,3,8,6];

$tree = new ConstructTree();
$root = $tree->constructByArr($pre, $in);

$tree->preOrder($root);
echo '<br />';
$tree->inOrder($root);







?>