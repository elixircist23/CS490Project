<?php

        $link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');
        mysql_select_db('as2487');

        if($link == false){
                die('Could not connect to SQL');
        }

        $user = $_GET['user'];

        $query = sprintf("SELECT exam_id, grade FROM UserGrades WHERE username = '%s';", $user);

        $result = mysql_query($query);
        $returnArray = array();

        while($row = mysql_fetch_array($result)){
                $returnArray[] = array('exam_id' => $row['exam_id'], 'grade' =>
                $row['grade']);
        }

        $json = json_encode($returnArray);
        echo $json;

        mysql_close($link);

?>