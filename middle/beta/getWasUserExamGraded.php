<?php

/*
Kb295 - middle - getWasUserExamGraded.php
Kevin Butryn
*/
  $username = $_GET["user"];
  $exam_id = $_GET["id"];
	$curl = curl_init();
	curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => "https://web.njit.edu/~as2487/cs490/beta/getWasUserExamGraded.php?user=" .$username."&id=".$exam_id));    
/////////////////////////
	$result = curl_exec($curl);
	echo $result;
?>
