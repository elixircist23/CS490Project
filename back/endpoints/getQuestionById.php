<?php

	$link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');
	mysql_select_db('as2487');

	if($link == false){
		die('Could not connect to SQL');
	}

	$id = $_GET['id'];

	$query = sprintf("SELECT question_body, question_weight FROM Questions WHERE question_id = '%s';", $id);
	$result = mysql_query($query);
	$returnArray = array();

	while($row = mysql_fetch_array($result)){
		$returnArray[] = array('question_body' => $row['question_body'], 'question_weight' =>
		$row['question_weight']);
	}

	$json = json_encode($returnArray);
	echo $json;

	mysql_close($link);

?>
