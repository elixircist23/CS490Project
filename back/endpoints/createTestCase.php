<?php

        $body = json_decode(file_get_contents('php://input'), true);
	$link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');

	if($link == false){
		die('Could not connect to SQL');
	}

	mysql_select_db('as2487');

	$length = count($body);
	for($i = 0; $i < $length; $i++){
		$test_case_weight = $body[$i]['test_case_weight'];
		$question_id = $body[$i]['question_id'];
		$test_case = $body[$i]['test_case'];
		$test_case_answer = $body[$i]['test_case_answer'];
		$query = sprintf('INSERT INTO TestCases (question_id, test_case, test_case_answer, test_case_weight) VALUES ("%s","%s","%s","%s");', $question_id,
		$test_case, $test_case_answer, $test_case_weight);
		mysql_query($query);
	}	


	mysql_close($link);

?>												
