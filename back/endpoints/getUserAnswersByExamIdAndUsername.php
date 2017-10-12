<?php

	$link = mysql_connect('sql.njit.edu','as2487','QOdKwfpVY');
	
	if($link == false){
		die('Could not connect to SQL');
	}

	mysql_select_db('as2487');

	$id = $_GET['id'];
	$user = $_GET['user'];

	$query = sprintf('SELECT answer_id, question_id, answer_body FROM UserAnswers WHERE exam_id = "%s"
	AND username = "%s";', $id, $user);

	$result = mysql_query($query);
	$returnArray = array();

	while($row = mysql_fetch_array($result)){
		$returnArray[] = array('answer_id' => $row['answer_id'], 'question_id' =>
		$row['question_id'], 'answer_body' => $row['answer_body']);
	}

	$json = json_encode($returnArray);
	echo $json;

	mysql_close($link);

?>
