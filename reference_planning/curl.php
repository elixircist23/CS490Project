<?php
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "https://web.njit.edu/~as2487/get.php?num1=9&num2=10");
	$result = curl_exec($curl);
?>
