<?php

	$id = $_GET['id'];
	$user = $_GET['user'];

	$link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');

	if($link == false){
		die('Could not connect to SQL');
	}

	mysql_select_db('as2487');

	$query = sprintf('SELECT exam_id FROM UserAnswers WHERE exam_id = "%s" AND username = "%s";', $id, $user);
	$result = mysql_query($query);

	$returnArray = array();

	while($row = mysql_fetch_array($result)){
		$returnArray[] = array('exam_id' => $row['exam_id']);
	}

	if(empty($returnArray)){
		echo '{"taken":"false"}';
	}
	else{
		echo '{"taken":"true"}';
	}

	mysql_close($link);

?>
