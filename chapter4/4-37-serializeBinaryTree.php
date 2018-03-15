<?php
/**
 * 序列化和反序列化二叉树
 */
require("../class/tree.php");

//按照中序遍历来序列化
function serializeTree($node, &$str)
{
	if($node == null){
		$str .= '$';
		return;
	}
	$str .= $node->value;
	//序列化左右子树
	serializeTree($node->left, $str);
	serializeTree($node->right, $str);
}
//反序列化

function unSerializeTree(&$node, $str)
{
	if($num = readStr($str)){
		$node = new Node('',null,null);
		//构建根节点
		$node->value = $num;
		unSerializeTree($node->left, $str);
		unSerializeTree($node->right, $str);
	}
}
function readStr($str)
{
	static $count = 0;
	if($count == strlen($str)){
		return;
	}
	if($str[$count] == '$'){
		$count++;
		return false;
	}else{
		$num = $str[$count];
		$count++;
		return $num;
	}
}

//test
$tree = new Tree();
$data = [5,4,6,3,2,7,8];
foreach ($data as $k => $v) {
	$tree->insert($v);
}

$root = $tree->root;
$serializeTree = '';
serializeTree($root, $serializeTree);
echo $serializeTree;

echo '<br />';
echo $tree->preOrder();
//反序列化

$index = 0;
$node = null;
unSerializeTree($node, $serializeTree);

$tree2 = new Tree();
$tree2->root = $node;
echo '<br />';
echo $tree2->preOrder();



?>