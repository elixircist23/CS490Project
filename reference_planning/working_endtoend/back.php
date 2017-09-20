<?php
	$user = $_GET["user"];
	$pass = $_GET["pass"];
	
	$myObj->answer = "rekt";

	$json = json_encode($myObj);
	echo $json;
?>
