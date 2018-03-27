<?php
$ip = 'SKY@qq.com.cn';
preg_match('/^[a-zA-Z0-9-_]+@[a-zA-Z0-9-_]+([\.a-zA-Z0-9-_]+)+$/', $ip, $matches);
var_dump($matches);exit;
$start = 1;
$end = 4;
echo ($start+$end) >> 1;

echo (($end-$start) >> 1) + $start;
exit;
var_dump($arr);exit;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	var_dump($_POST);
}
if($_SERVER['REQUEST_METHOD'] == 'GET'){
	var_dump($_GET);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form method="GET" action="/test.php">
		<input type="text" name="name">
		<input type="text" name="name">
		<input type="submit" value="submit">
	</form>
</body>
</html>
