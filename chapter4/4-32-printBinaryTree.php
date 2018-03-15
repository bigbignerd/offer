<?php
/**
 * 打印二叉树
 */
require("../class/tree.php");
require("../class/queue.php");

//树的广度优先遍历
function printBinaryTree($root)
{
	if($root == null){
		return false;
	}
	$queue = new Queue();
	//根节点先入队
	$queue->enQueue($root);
	while(!$queue->isEmpty()){
		//取出队首元素
		$node = $queue->deQueue();
		//打印当前node
		printf("%d\t", $node->value);
		if($node->left !== null){
			$queue->enQueue($node->left);
		}
		if($node->right !== null){
			$queue->enQueue($node->right);
		}
	}

}

//test
//    	  5
//     4    6
//	 3		  7
// 2			 8
$tree = new Tree();
$data = [5,4,6,3,2,7,8];
foreach ($data as $k => $v) {
	$tree->insert($v);
}

$root = $tree->root;
printBinaryTree($root);
?>