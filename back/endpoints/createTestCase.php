<?php

        $body = json_decode(file_get_contents('php://input'), true);
	$question_id = $body['question_id'];
	$test_case = $body['test_case'];
	$test_case_answer = $body['test_case_answer'];

	$link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');

	if($link == false){
		die('Could not connect to SQL');
	}

	mysql_select_db('as2487');

	$query = sprintf('INSERT INTO TestCases (question_id, test_case, test_case_answer) VALUES ("%s",
	"%s", "%s");', $question_id, $test_case, $test_case_answer);
	mysql_query($query);

	echo mysql_insert_id();

	mysql_close($link);

?>												
