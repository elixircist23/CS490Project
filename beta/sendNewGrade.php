<?php

	$user = $_GET["user"];
	$grade = $_GET["grade"];
  $exam_id = $_GET["exam_id"]; 
  
	$curl = curl_init();
  curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => "https://web.njit.edu/~as2487/cs490/beta/changeGrade.php?user=" . $user . "&grade=" . $grade."&id=".$exam_id));
	$result = curl_exec($curl);
?>