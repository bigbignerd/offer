<?php
/**
 * 单例模式
 */

class A
{
	protected $instance = null;
	protected function __construct()
	{
		
	}
	protected function __clone()
	{

	}
	protected function __wakeup()
	{

	}
	public function getInstance()
	{
		if(!isset(static::$instnace)){
			static::$instance = new static;
		}
		return static::$instance;
	}
}

?>