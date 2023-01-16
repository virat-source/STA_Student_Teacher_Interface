<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		$name = $_POST['name'];
        $studid = $_POST['studid'];
		$instructor = $_POST['instructor'];
		$subject = $_POST['subject'];
		$grade = $_POST['grade'];
		$dt1=date(date("Y-m-d H:i:s"));

		
		mysqli_query($conn, "INSERT INTO `student_grades` VALUES('', '$name', '$studid', '$instructor', '$subject', '$grade','$dt1')") or die(mysqli_error());
		header("location: index.php");
	}
?>