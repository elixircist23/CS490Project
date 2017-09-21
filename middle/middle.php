<?php
	$user = $_GET["user"];
	$pass = $_GET["pass"];

	$curl = curl_init();
	curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => "https://web.njit.edu/~as2487/back.php?user=" . $user . "&pass=" . $pass));
	$result = curl_exec($curl);

	echo $result;
?>
