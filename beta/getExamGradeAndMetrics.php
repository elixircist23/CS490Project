<?php

	$curl = curl_init();
	curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => "https://web.njit.edu/~kb295/examMetrics.php")); 
	$result = curl_exec($curl);
	echo $result;
?>