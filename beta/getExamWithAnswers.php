<?php
  session_start();
  $exam_id = $_GET["id"];
  //$username = $_GET["username"];
	$curl = curl_init();
 
  //echo $_SESSION["username"];
 
	curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => "https://web.njit.edu/~as2487/cs490/beta/getAllByExamIdAndUsername.php?user=" . $_SESSION["username"]."&id=".$exam_id));    /////////////////////////
	$result = curl_exec($curl);
	echo $result;
?>