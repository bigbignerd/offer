<?php
/**
 * 判断一个二叉树是否对称
 */

function isSymmetry($tree)
{
	return compareRecursively($tree, $tree);
}
function compareRecursively($tree1, $tree2)
{
	if($tree1 == null && $tree2 == null){
		return true;
	}
	
	if($tree1 == null || $tree2 = null){
		return false;
	}

	if($tree1->data !== $tree2->data){
		return false;
	}
	return compareRecursively($tree1->left, $tree->right) && compareRecursively($tree1->right, $tree2->left);
}
?>