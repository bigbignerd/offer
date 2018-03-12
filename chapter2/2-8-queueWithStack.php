<?php
/**
 * 用两个栈来实现一个队列
 */
class Stack
{
	private $data = [];

	public function pop()
	{
		return array_pop($this->data);
	}
	public function push($element)
	{
		return array_push($this->data, $element);
	}
	public function isEmpty()
	{
		return empty($this->data)? true : false;
	}
}

class QueueWithStack
{
	private $stack1;
	private $stack2;

	public function __construct()
	{
		$this->stack1 = new Stack();
		$this->stack2 = new Stack();
	}
	//入队
	public function appendTail($value)
	{
		return $this->stack1->push($value);
	}
	//出队
	public function deleteHead()
	{
		//stack2 为空 则将stack1元素压入stack2中
		if($this->stack2->isEmpty()){
			while(!$this->stack1->isEmpty()){
				$v = $this->stack1->pop();
				$this->stack2->push($v);
			}
		}
		return $this->stack2->pop();
	}
}

$queue = new QueueWithStack();
for($i=1;$i<10;$i++){
	$queue->appendTail($i);
}
echo $queue->deleteHead();
echo $queue->deleteHead();
echo $queue->deleteHead();

?>