<?php

	$link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');
	mysql_select_db('as2487');

	if($link == false){
		die('Could not connect to SQL');
	}

	$id = $_GET['id'];
	
	$query = sprintf('SELECT * FROM TestCases WHERE question_id = %s;', $id);
	$result = mysql_query($query);
	$returnArray = array();

	while($row = mysql_fetch_array($result)){
		$returnArray[] = array('test_case_id' => $row['test_case_id'], 'question_id' => $row['question_id'],
		'test_case' => $row['test_case'], 'test_case_answer' => $row['test_case_answer']);
	}

	$json = json_encode($returnArray);
	echo $json;

	mysql_close($link);

?>
