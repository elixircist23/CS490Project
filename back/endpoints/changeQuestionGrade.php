<?php

	$exam_id = $_GET['exam_id'];
	$username = $_GET['username'];
	$question_id = $_GET['question_id'];
	$question_weight = $_GET['question_weight'];

	$link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');

	if($link == false){
		die('error in db');
	}

	mysql_select_db('as2487');

	$query = sprintf('update UserAnswers set question_weight = %s where exam_id = %s and
	username = "%s" and question_id = %s', $question_weight, $exam_id, $username,
	$question_id);
	$result = mysql_query($query);

	mysql_close($link);

?>
