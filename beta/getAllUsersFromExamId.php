<?php
  session_start();
  $exam_id = $_GET["exam_id"];
	$curl = curl_init();
	curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => "https://web.njit.edu/~as2487/cs490/beta/getGradesByExamId.php?id=".$exam_id));
  $result = curl_exec($curl);
	echo $result;
?>