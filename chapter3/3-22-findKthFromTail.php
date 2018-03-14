<?php
/**
 * 寻找链表中的倒数第k个节点
 */
function findKthNode($listHead,$k)
{
	if($listHead == null || $k <= 0){
		return false;
	}
	$ahead = $listHead;
	$behind = null;
	//ahead先向前走k-1步
	for($i=1; $i<=$k-1; $i++){
		if($ahead->next !== null){
			$ahead = $ahead->next;
		}else{
			return false;
		}
	}
	//然后behind从head开始跟着一起走
	$behind = $listHead;
	while($ahead->next !== null){
		$behind = $behind->next;
		$ahead  = $ahead->next; 
	}
	return $behind->data;
}
include "../chapter2/2-6-linklist.php";
$link2Head = $link2->head;
echo '<br />';
echo findKthNode($link2Head,2);

echo '<br />';
echo findKthNode($link2Head,3) == false;


?>