<?php

	$exam_id = $_GET['id'];

	$link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');

	if($link == false){
		die('error');
	}

	mysql_select_db('as2487');

	$query = sprintf('SELECT username, grade from UserGrades WHERE exam_id = %s;', $exam_id);
	$result = mysql_query($query);

	$returnArray = array();

	while($row = mysql_fetch_array($result)){
		$returnArray[] = array('username' => $row['username'], 'grade' => $row['grade']);	
	}

	if(empty($returnArray)){
		echo '{}';
	} else {
		echo json_encode($returnArray);
	}
	
?>
