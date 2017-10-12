<?php
	//Creating a valid user and pass to store in the database
	$user = "ali";
	$pass = "1234";
	$type = "instructor";
	//Won't be storing plaintext password, so hash the password and store the hash in the database
	$hash = password_hash($pass, PASSWORD_DEFAULT);

	//connect to mysql and run the query
	mysql_connect ("sql.njit.edu", "as2487", "QOdKwfpVY");

	if($link===false){
		die("error " . mysql_connect_error());
	}

	mysql_select_db("as2487");

	$query = "insert into Users (username, password, type) values ('%s','%s','%s');";
	mysql_query(sprintf($query, $user, $hash, $type));
?>
