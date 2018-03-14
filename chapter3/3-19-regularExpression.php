<?php
/**
 * 实现包含.和*的正则表达式模式匹配
 */
function matchCore($str, $strIndex, $pattern, $patternIndex)
{
	$strLen = strlen($str);
	$patternLen = strLen($pattern);

	//正则模式和字符串刚好都匹配完
	if($strIndex == $strLen-1 && $patternIndex == $patternLen-1){
		return true;
	}
	//字符串没到末尾，正则已经匹配完成
	if($strIndex !== $strLen-1 && $patternIndex == $patternLen-1){
		return false;
	}
	//判断正则模式的第二个字符是否为*
	if($pattern[$patternIndex+1] == "*"){
		//字符串的第一个字符与pattern第一个字符匹配上的情况
		if($str[$strIndex] == $pattern[$patternIndex] || ($pattern[$patternIndex] == "." && $strIndex < $strLen)){
			//分三种情况：1、匹配了0次 2、匹配了1次 3、匹配多次
			return matchCore($str, $strIndex, $pattern,$patternIndex+2) 
				|| matchCore($str, $strIndex+1, $pattern, $patternIndex+2)
				|| matchCore($str, $strIndex+1, $pattern, $patternIndex);
		}else{
			//没匹配上，但因为是*，所以直接忽略
			return matchCore($str, $strIndex, $pattern, $patternIndex+2);
		}
	}
	//正常匹配一个字符
	if($str[$strIndex] == $pattern[$patternIndex] || ($pattern[$patternIndex] == '.' && $strIndex < $strLen)){
		return matchCore($str, $strIndex+1, $pattern, $patternIndex+1);
	}
	return false;

}

function match($str, $pattern)
{
	if(empty($str) || empty($pattern)){
		return false;
	}
	return matchCore($str,$strIndex,$pattern, $patternIndex);
}

//test 1
$str = 'aaa';
$pattern = 'a.*a';
echo match($str, $pattern)? 'match' : 'not match';









?>