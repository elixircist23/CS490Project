<?php

	$link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');
	mysql_select_db('as2487');

	if($link == false){
		die('Could not connect to SQL');
	}
	
	$id = $_GET['id'];

	$query = sprintf("SELECT question_id, exam_name FROM Exams WHERE exam_id = '%s';", $id);
	$result = mysql_query($query);
	$returnArray = array();
	
	while($row = mysql_fetch_array($result)){
		$returnArray[] = array('question_id' => $row['question_id'], 'exam_name' => $row['exam_name']);
	}

	$json = json_encode($returnArray);
	echo $json;

	mysql_close($link);

?>
