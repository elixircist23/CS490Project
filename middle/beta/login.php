<?php
  /*
Kb295 - middle - login.php
Kevin Butryn
*/
	$user = $_GET["user"];
	$pass = $_GET["pass"];
  $type = $_GET["type"];
	$curl = curl_init();
	//curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => "https://web.njit.edu/~kb295/middle.php?user=" . $user . "&pass=" . $pass));
  curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => "https://web.njit.edu/~as2487/cs490/beta/login.php?user=" . $user . "&pass=" . $pass."&type=".$type));
  
	$result = curl_exec($curl);
	echo $result;
?>