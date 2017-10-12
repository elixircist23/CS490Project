<?php

        $body = json_decode(file_get_contents('php://input'), true);
        $username = $body['username'];
        $exam_id = $body['exam_id'];
        $grade = $body['grade'];
        $link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');

        if($link == false){
		die('Could not connect to SQL');
        }

        mysql_select_db('as2487');

        $query = sprintf('INSERT INTO UserGrades (username, exam_id, grade) VALUES ("%s", %s, %s);', $username, $exam_id, $grade);
        mysql_query($query);

        mysql_close($link);

?>
