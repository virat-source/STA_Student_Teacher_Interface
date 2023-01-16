<?php
	include('conn.php');
	

	
	if(ISSET($_POST['submit'])){
		$id = $_POST['id'];
		$sch = $_POST['schedule'];
		$name = $_POST['name'];
       	$instructor = $_POST['instructor'];
		$subject = $_POST['subject'];
		$tr_type = $_POST['training_type'];
		$grade = $_POST['grade'];
		$dt1=date(date("Y-m-d H:i:s"));

		if($grade < 8) {$finals = "failed";
		} else {
			$finals = "passed";
			}

		
		mysqli_query($conn, "UPDATE `student_grades` SET name='$name', instructor='$instructor', subject='$subject', training_type='$tr_type', grade='$grade', time='$dt1' WHERE id=$id") or die(mysqli_error());
		header("location: index.php?id=$sch");

	}
?>