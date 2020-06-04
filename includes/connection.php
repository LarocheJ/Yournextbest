<?php 
    session_start();

	//Hostinger
	// $server = "localhost";
	// $username = "u311269886_jim";
	// $password = "1Thousand!";
	// $db = "u311269886_ynb";

	//Local Connection
	$server = "localhost";
	$username = "root";
	$password = "";
	$db = "u311269886_ynb";
	
	$connection = mysqli_connect($server,$username,$password,$db);

	if(!$connection){
		die("Connection failed: " . mysqli_connect_error());
	}
?>