<?php
/**
 * 完全二叉树的镜像
 * 思路：就是将所有非叶子节点的左右节点进行交换
 */

function mirrorRecursively($tree)
{
	if($tree == null){
		return;
	}
	//判断是否含有左右子树
	if($tree->left == null && $tree->right ==null){
		return;
	}
	$temp = $tree->left;
	$tree->left = $tree->right;
	$tree->right = $temp;
	if($tree->left){
		mirrorRecursively($tree->left) 		
	}
	if($tree->right){
		mirrorRecursively($tree->right);
	}
}
?>