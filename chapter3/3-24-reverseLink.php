<?php
/**
 * 反转链表
 */

function reverse($head)
{
	if($head == null){
		return false;
	}
	//当前节点
	$curNode = $head;
	//前一个节点
	$prevNode = null;
	//反转之后的头节点
	$reverseHead = null;

	while($curNode !== null){
		$nextNode = $curNode->next;
		//链表只有一个节点的情况
		if($nextNode == null){
			$reverseHead = $curNode;
		}

		$curNode->next = $prevNode;
		$prevNode = $curNode;
		$curNode = $nextNode;
	}
	return $reverseHead;
}

include "../chapter2/2-6-linklist.php";
echo 'reverse link node test';
echo '<hr>';
$pHead = $link->head;
$reverseHead = reverse($pHead);
if($reverseHead == 'false'){
	echo '头指针错误';
	exit;
}
$link->head = $reverseHead;
$link->show();

?>