<?php

        $link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');
        mysql_select_db('as2487');

        if($link == false){
                die('Could not connect to SQL');
        }

        $id = $_GET['id'];
        $user = $_GET['user'];

        $query = sprintf("SELECT test_case_id, answer_id, test_case_result FROM Results WHERE question_id = '%s' AND username = '%s';", $id, $user);

        $result = mysql_query($query);
        $returnArray = array();

        while($row = mysql_fetch_array($result)){
                $returnArray[] = array('test_case_id' => $row['test_case_id'], 'answer_id' =>
                $row['answer_id'], 'test_case_result' => $row['test_case_result']);
        }

        $json = json_encode($returnArray);
        echo $json;

        mysql_close($link);

?>