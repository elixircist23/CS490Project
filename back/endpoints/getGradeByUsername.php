<?php

        $link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');
        mysql_select_db('as2487');

        if($link == false){
                die('Could not connect to SQL');
        }

        $user = $_GET['user'];
	$exam_id = $_GET['id'];

        $query = sprintf("SELECT grade FROM UserGrades WHERE username = '%s' AND exam_id = '%s';", $user, $exam_id);

        $result = mysql_query($query);
        $returnArray = array();

        while($row = mysql_fetch_array($result)){
                $returnArray[] = array('grade' =>
                $row['grade']);
        }

        $json = json_encode($returnArray);
        echo $json;

        mysql_close($link);

?>
