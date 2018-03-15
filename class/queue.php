<?php
/**
 * 数组模拟队列
 */

class Queue
{
	private $data = [];
	
	//入队
	public function enQueue($value)
	{
		return array_unshift($this->data, $value);
	}
	//出队
	public function deQueue()
	{
		return array_pop($this->data);		
	}
	//队列是否为空
	public function isEmpty()
	{
		return (empty($this->data))? true : false;
	}
}
?>