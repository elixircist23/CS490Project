<?php

	$id = $_GET["id"];
	$curl = curl_init();
  curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => "https://web.njit.edu/~kb295/cs490/beta/createMetrics.php?id=" . $id);
	$result = curl_exec($curl);
	echo $result;
?>