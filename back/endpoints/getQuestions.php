<?php
	$link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');

	if($link == false){
		die("Could not connect to SQL");
	}

	mysql_select_db("as2487");

	$query = "SELECT * from Questions;";
	$result = mysql_query($query);

	$returnArray = array();

	while($row = mysql_fetch_array($result)){
		$returnArray[] = array('question_id' => $row['question_id'], 'question_body' =>
		$row['question_body'], 'question_weight' => $row['question_weight']);
	}

	$json = json_encode($returnArray);
	echo $json;

	mysql_close($link);

?>
