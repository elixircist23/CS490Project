<?php

	$link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');
	mysql_select_db('as2487');

	if($link == false){
		die('error');
	}

	$username = $_GET['user'];
	$exam_id = $_GET['id'];
	$new_grade = $_GET['grade'];

	$query = sprintf('UPDATE UserGrades SET grade = %s WHERE username = "%s" and exam_id = %s;', $new_grade, $username, $exam_id);
	$result = mysql_query($query);

?>
