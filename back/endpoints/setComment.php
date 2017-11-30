<?php

	$link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');
	mysql_select_db('as2487');

	if($link == false){
		die('error');	
	}

	$qid = $_GET['question_id'];
	$eid = $_GET['exam_id'];
	$user = $_GET['user'];
	$comment = $_GET['comment'];

	$query = sprintf("UPDATE UserAnswers SET comment = '%s' where question_id = %s and exam_id = %s and username = '%s';", $comment, $qid, $eid,
	$user);
	mysql_query($query);



?>
