<?php

date_default_timezone_set('America/Los_Angeles');

$script_tz = date_default_timezone_get();

if (strcmp($script_tz, ini_get('date.timezone'))){
    echo '';
} else {
    echo '';
}
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		$ln = $_POST['LASTNAME'];
		$fn = $_POST['FIRSTNAME'];
		$mn = $_POST['MIDDLENAME'];
        $gen = $_POST['GENDER'];
		$subject = $_POST['PROGRAM'];

		mysqli_query($conn, "INSERT INTO `student_info` VALUES('', '', '$ln', '$fn', '$mn', '$gen', '$subject')") or die(mysqli_error());
		header("location: index.php");
	}
?>