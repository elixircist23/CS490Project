<?php

        $body = json_decode(file_get_contents('php://input'), true);
        $username = $body['username'];
        $test_case_id = $body['test_case_id'];
        $question_id = $body['question_id'];
        $answer_id = $body['answer_id'];
        $test_case_result = $body['test_case_result'];
        
        $link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');

        if($link == false){
                die('Could not connect to SQL');
        }

        mysql_select_db('as2487');

        $query = sprintf('INSERT INTO Results (username, test_case_id, question_id, answer_id, test_case_result) VALUES ("%s", %s, %s, %s, "%s");', $username, $test_case_id, $question_id, $answer_id, $test_case_result);
        mysql_query($query);

        mysql_close($link);

?>