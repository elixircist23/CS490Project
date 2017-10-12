<?php

        $body = json_decode(file_get_contents('php://input'), true);
        $question_body = $body['question_body'];
	$question_weight = $body['question_weight'];

        $link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');

        if($link == false){
                die('Could not connect to SQL');
        }

        mysql_select_db('as2487');
        
	$query = sprintf('INSERT INTO Questions (question_body, question_weight) VALUES ("%s", "%s");',
	$question_body, $question_weight);
	mysql_query($query);

	echo mysql_insert_id();
	
	mysql_close($link);

?>
