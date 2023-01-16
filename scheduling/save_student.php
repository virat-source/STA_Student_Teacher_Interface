<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		$name = $_POST['name'];
		$grade = $_POST['grade'];

		
		mysqli_query($conn, "INSERT INTO `student_grades` VALUES('', '$name', '$grade')") or die(mysqli_error());
		header("location: index.php");
	}
?>