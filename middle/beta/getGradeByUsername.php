<?php
/*
Kb295 - middle - getGradeByUsername.php
Kevin Butryn
*/
    session_start();
    $id = $_GET["id"];
    $username = $_GET["user"];
   	$curl = curl_init();
    curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => "https://web.njit.edu/~as2487/cs490/beta/getGradeByUsername.php?id=".$id."&user=".$username ));
  	$result = curl_exec($curl);
  	echo $result;
?>
