<?php

	$question_id = $_GET['id'];
	$username = $_GET['user'];

	$link = mysql_connect('sql.njit.edu','as2487','QOdKwfpVY');

	if($link == false){
		die('error');
	}

	mysql_select_db('as2487');

	$query = sprintf('SELECT test_case_weight FROM Results WHERE question_id = %s AND username = "%s";',$question_id, $username);
	$result = mysql_query($query);
	
	$count = 0;

	while($row = mysql_fetch_array($result)){
		$count = $count + (int)$row['test_case_weight'];
	}

	echo $count;
?>
