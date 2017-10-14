<?php

	$body = json_decode(file_get_contents('php://input'), true);
	$question_id = $body['question_id'];
	$exam_name = $body['exam_name'];
	$exam_id = $body['exam_id'];

	if($question_id == '' or $exam_name == ''){
		die('');
	}

	$link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');
	
	if($link == false){
		die('Could not connect to SQL');
	}
	
	mysql_select_db('as2487');
	
	if($exam_id == ''){
		$query = sprintf('INSERT INTO Exams (question_id, exam_name) VALUES ("%s", "%s");', $question_id, $exam_name);
	}
	else{
		$query = sprintf('INSERT INTO Exams (exam_id, question_id, exam_name) VALUES
		("%s","%s","%s");' $exam_id, $question_id, $exam_name);
	}

	mysql_query($query);

	echo mysql_insert_id();

	mysql_close($link);

?>
