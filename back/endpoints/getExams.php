<?php
	$link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');

	if($link == false){
		die('Could not connect to SQL');
	}

	mysql_select_db('as2487');

	$query = 'SELECT DISTINCT exam_id, exam_name FROM Exams;';
	$result = mysql_query($query);
	
	$returnArray = array();
	
	while($row = mysql_fetch_array($result)){
		$returnArray[] = array('exam_id' => $row['exam_id'], 'exam_name' => $row['exam_name']);
	}
	
	$json = json_encode($returnArray);
	echo $json;

	mysql_close($link);
?>
