<?php

	$body = json_decode(file_get_contents('php://input'), true);
	$link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');
	
	if($link == false){
		die('Could not connect to SQL');
	}
	
	mysql_select_db('as2487');
	
	$result = mysql_query('SELECT MAX(exam_id) FROM Exams;');
	$exam_id =  mysql_result($result, 0);
	$exam_id++;

	$length = count($body);
	for($i = 0; $i < $length; $i++){
		$exam_name = $body[$i]['exam_name'];
		$question_id = $body[$i]['question_id'];
		$query = sprintf('INSERT INTO Exams (exam_id, exam_name, question_id) VALUES ("%s","%s","%s");', $exam_id, $exam_name,
		$question_id);
		mysql_query($query);
	}

	mysql_close($link);

?>
