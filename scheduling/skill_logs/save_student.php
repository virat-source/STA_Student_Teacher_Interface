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
		$sch = $_POST['schedule'];
		$name = $_POST['name'];
       	$instructor = $_POST['instructor'];
		$subject = $_POST['subject'];
		$tr_type = $_POST['training_type'];
		$grade = $_POST['grade'];
		$hours = $_POST['hours'];
		$dt1=date(date("Y-m-d H:i:s"));

		if($grade < 8) {$finals = "failed";
		} else {
			$finals = "passed";
			}

		
		mysqli_query($conn, "INSERT INTO `student_grades` VALUES('', '$sch', '$name', '$instructor', '$subject', '$tr_type', 'Skill', '$grade','$hours','$finals','$dt1')") or die(mysqli_error());
		header("location: index.php?id=$sch");

		mysqli_query($conn, "INSERT INTO `hours_logged` VALUES('', '$instructor', '$name', '$subject','$hours')") or die(mysqli_error());
		header("location: index.php?id=$sch");
	}
?>