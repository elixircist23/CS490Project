<?php

	$user = $_GET["user"];
	$question_id = $_GET["question_id"];
  $exam_id = $_GET["exam_id"];
  $comment = $_GET["comment"]; 
    $comment = urlencode($comment);
  $query = sprintf('https://web.njit.edu/~as2487/cs490/beta/setComment.php?exam_id=%s&question_id=%s&user=%s&comment=%s', $exam_id, $question_id, $user, $comment);

  echo $query;
  
	$curl = curl_init();
  curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => $query));
	$result = curl_exec($curl);
?>