<?php
/**
 * 二维数组排序
 */

function sort2dArray($arr, $field, $order='SORT_DESC')
{
	if(empty($arr) || empty($field)){
		return false;
	}

	//取出排序的field
	$fieldValue = [];
	foreach ($arr as $k => $v) {
		$fieldValue[] = $v[$field];
	}
	array_multisort($fieldValue,constant($order),$arr);
	return $arr;
}

//test

$arr = array(
  array('num'=>'001','id'=>6,'name'=>'zhangsan','age'=>21),
  array('num'=>'001','id'=>7,'name'=>'ahangsan','age'=>23),
  array('num'=>'003','id'=>1,'name'=>'bhangsan','age'=>23),
  array('num'=>'001','id'=>3,'name'=>'dhangsan','age'=>23),
);

$sorted = sort2dArray($arr, 'id', 'SORT_ASC');
print_r($sorted);

?>