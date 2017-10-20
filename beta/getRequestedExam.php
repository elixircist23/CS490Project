<?php
  $id = $_GET["id"];
	$curl = curl_init();
	curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => "https://web.njit.edu/~as2487/cs490/beta/getExamQuestionBodiesById.php?id=". $id));  
	$result = curl_exec($curl);
	echo $result;

?>