<?php

        $id = $_GET['id'];
        $user = $_GET['user'];

        $link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');

        if($link == false){
                die('Could not connect to SQL');
        }

        mysql_select_db('as2487');

        $query = sprintf('SELECT grade FROM UserGrades WHERE exam_id = "%s" AND username = "%s";', $id, $user);
        $result = mysql_query($query);

        $returnArray = array();

        while($row = mysql_fetch_array($result)){
                $returnArray[] = array('grade' => $row['grade']);
        }

        if(empty($returnArray)){
                echo '{"graded":"false"}';
        }
        else{
                echo '{"graded":"true"}';
        }

        mysql_close($link);

?>
