<?php
/**
 * 栈
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

?>