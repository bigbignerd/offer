<?php
/**
 * 简单的链表，实现插入、删除、打印、反向打印
 */
class Node
{
	public $data;
	public $next;

	public function __construct($data, $next)
	{
		$this->data = $data;
		$this->next = $next;
	}
	public function setNext($next)
	{
		$this->next = $next;
	}
	public function setData($data)
	{
		$this->data = $data;
	}
}

class LinkList
{
	public $head;

	public function insert($val)
	{
		if($this->head == null){
			$this->head = new Node($val, null);
			return true;
		}
		$newNode = new Node($val, null);
		$node = $this->head;
		while($node->next !== null){
			$node = $node->next;
		}
		$node->next = $newNode;

		return true;
	}
	public function delete($i)
	{
		if($this->head == null){
			return false;
		}
		$node = $this->head;
		$j = 0;
		//找到i的前一个节点
		while($node !== null && $j < $i-1){
			$node = $node->next;
			$j++;
		}
		if($node->next == null){
			return false;
		}
		//要删除的节点元素
		$el = $node->next->data;
		$nodeNext = $node->next->next;
		unset($node->next);
		$node->next = $nodeNext;
		return $el;
	}
	public function show()
	{
		$node = $this->head;
		$str = '';
		while($node->next !== null){
			$str .= '['.$node->data.']->';
			$node = $node->next;
		}
		echo $str.'['.$node->data.']';
	}
	//1、通过递归来实现链表逆序打印，可能的问题是递归太深，栈溢出
	//2、通过一个辅助的栈结构
	public function reverseShow($node)
	{
		if($node == null){
			return false;
		}
		if($node->next !== null){
			$this->reverseShow($node->next);
		}
		echo '['.$node->data.']->';
	}
}

$link = new LinkList();
$arr = [1,2,3,4,5,6];
foreach ($arr as $k => $v) {
	$link->insert($v);
}
$link->show();
echo '<br />';
// $link->delete(2);
// $link->show();
//反向打印
echo $link->reverseShow($link->head);
?>