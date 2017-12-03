<?php
/*
Kb295 - middle - changeQuestionGrade.php
Kevin Butryn
*/
    
    $exam_id = $_GET["exam_id"];
    $username = $_GET["username"];
    $question_weight = $_GET["question_weight"];
    $question_id = $_GET["question_id"];
    
   	$curl = curl_init();
    curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => "https://web.njit.edu/~as2487/cs490/beta/changeQuestionGrade.php?exam_id=".$exam_id."&username=".$username."&question_weight=".$question_weight."&question_id=".$question_id ));
  	$result = curl_exec($curl);
  	echo $result;
?>
