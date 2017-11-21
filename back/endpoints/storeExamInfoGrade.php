<?php

	$exam_id = $_GET['id'];
	$count = $_GET['count'];

	$link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');

	if($link == false){
		die('Could not connect to SQL');
	}

	mysql_select_db('as2487');

	$query = sprintf('INSERT INTO Exam_Info (exam_id, graded, count) VALUES (%s, "true", %s);', $exam_id, $count);
	$result = mysql_query($query);

?>
