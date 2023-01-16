<?php
	$conn = mysqli_connect("localhost", "root", "", "db_sta");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>