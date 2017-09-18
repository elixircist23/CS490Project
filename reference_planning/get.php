<?php
	$num1 = $_GET['num1'];
	$num2 = $_GET['num2'];
	$num3 = $num1 * $num2;

	$myObj->answer = $num3;

	$json = json_encode($myObj);
	echo $json;
?>
