<?php

	$link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');
	mysql_select_db('as2487');

	if($link == false){
		die('error');
	}

	$id = $_GET['id'];

	$query = sprintf('SELECT username, grade FROM UserGrades WHERE exam_id = %s', $id);
	$result = mysql_query($query);

	$returnArray = array();

	while($row = mysql_fetch_array($result)){
		$returnArray[] = array(
			'username' => $row['username'],
			'grade' => $row['grade']
		);
	}

	echo json_encode($returnArray);

?>
