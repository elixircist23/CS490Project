<?php

	$exam_id = $_GET['id'];

	$link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');

	if($link == false){
		die('error');
	}

	mysql_select_db('as2487');

	$query = sprintf('SELECT count FROM Exam_Info WHERE exam_id = %s', $exam_id);
	$result = mysql_query($query);

	if(mysql_result($result, 0) != ''){
		echo '{"graded":"true","count":' . mysql_result($result, 0) . '}';
	} else{
		echo '{"graded":"false","count":0}';
	}

?>
