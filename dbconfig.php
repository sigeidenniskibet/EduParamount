<?php 

$servername = "localhost";
	$username = "root";
	$password = '';
	$dbname = "eduparamountdb";

	// create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// check connection
	if (!$conn) {
		die("coection failed" . mysql_connect_error());
	}else{
		echo "";

	} 


 ?>