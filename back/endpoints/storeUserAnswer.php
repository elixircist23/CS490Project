<?php

        $body = json_decode(file_get_contents('php://input'), true);
        $exam_id = $body['exam_id'];
        $question_id = $body['question_id'];
        $username = $body['username'];
        $answer_body = $body['answer_body'];

        $link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');

        if($link == false){
                die('Could not connect to SQL');
        }

        mysql_select_db('as2487');

        $query = sprintf('INSERT INTO UserAnswers (exam_id, question_id, username, answer_body) VALUES (%s, %s, "%s", "%s");', $exam_id, $question_id, $username, $answer_body);
        mysql_query($query);

        echo mysql_insert_id();

        mysql_close($link);

?>
