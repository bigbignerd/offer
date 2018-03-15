<?php
/**
 * 实现一个可以返回栈中最小元素的栈，并且使得push pop min的时间复杂度都是O(1)
 */

class Stack
{
	private $data = [];
	public function push($num)
	{
		return array_push($this->data, $num);
	}

	public function pop()
	{
		return array_pop($this->data);
	}
	public function top()
	{
		return end($this->data);
	}
}
class MinStack
{
	private $minStack = null;
	private $stack = null;

	public function __construct()
	{
		$this->stack = new Stack();
		$this->minStack = new Stack();
	}
	public function push($num)
	{
		$this->stack->push($num);
		$curMin = $this->minStack->top();

		if($curMin !== false && $curMin < $num){
			$this->minStack->push($curMin);
		}else{
			$this->minStack->push($num);
		}
	}

	public function pop()
	{
		$this->minStack->pop();
		return $this->stack->pop();
	}

	public function min()
	{
		return $this->minStack->top();
	}
}
$stack = new MinStack();

foreach (range(1,10) as $k => $v) {
	$stack->push($v);
}

echo $stack->min();
echo '<br />';
echo $stack->pop();
echo '<br />';
echo $stack->min();


?>