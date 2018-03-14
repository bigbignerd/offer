<?php
/**
 * 合并两个链表
 */

function merge($link1,$link2)
{
	if($link1 == null){
		return $link2;
	}elseif($link2 == null){
		return $link1;
	}
	$mergeLink = null;
	//比较两个链表头结点的大小
	if($link1->data > $link2->data){
		$mergeLink = $link2;
		$mergeLink->next = merge($link1,$link2->next);
	}else{
		$mergeLink = $link1;
		$mergeLink->next = merge($link1->next, $link2);
	}
	return $mergeLink;
}

//test
include "../chapter2/2-6-linklist.php";
echo '<hr>';
echo 'test link merge <br />';
$arr1 = [1,3,5,7,9];
$arr2 = [2,4,6,8,10];
$l1 = new LinkList();
foreach ($arr1 as $k => $v) {
	$l1->insert($v);
}
$l2 = new LinkList();
foreach ($arr2 as $k => $v) {
	$l2->insert($v);
}
// $l2->head = null;
$merge = new LinkList();
$mergeLink = merge($l1->head, $l2->head);
if(!$mergeLink){
	echo '链表都为空';
	exit;
}
$merge->head = $mergeLink;
$merge->show();
?>