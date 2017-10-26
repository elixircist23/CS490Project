<?php

/*
Kb295 - middle - getDidUserTakeExam.php
Kevin Butryn
*/
  session_start();
  $exam_id = $_GET["id"];
  $username = $_GET["user"];
	$curl = curl_init();
	curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => 
"https://web.njit.edu/~as2487/cs490/beta/getDidUserTakeExam.php?user=".$username."&id=".$exam_id));
  
  $result = curl_exec($curl);
	echo $result;
?>
