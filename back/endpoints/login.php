<?php
	//get the user and pass values from middle
	$user = $_GET["user"];
	$pass = $_GET["pass"];

	//connect to the db
	mysql_connect("sql.njit.edu", "as2487", "QOdKwfpVY");

	//if connection didn't work, die
	if($mysql_connect === false){
		die("error " . mysql_connect_error());
	}

	//use the db in the sql server
	mysql_select_db("as2487");

	//get the stored hashed password from the database
	$query = "select password,type from Users where username = '%s';";
	
	$pass_from_db = mysql_query(sprintf($query, $user));
	$password = mysql_result($pass_from_db, 0, 0);
	$type = mysql_result($pass_from_db, 0, 1);

	//verify the password and return either true or false and create a json object
	$jsonObj->answer_db = password_verify($pass, $password);
	$jsonObj->type = $type;

	//encode the object to actually be json
	$json = json_encode($jsonObj);
	//echo the result back to middle
	echo $json;
?>
