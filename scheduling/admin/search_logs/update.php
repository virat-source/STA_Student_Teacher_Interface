<?php
	include('conn.php');
	$id=$_GET['id'];

	
	if(ISSET($_POST['submit'])){
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

		
		mysqli_query($conn, "UPDATE `student_grades` VALUES('$name', '$instructor', '$subject', '$tr_type', '$grade','$finals','$dt1') WHERE id='$id'") or die(mysqli_error());
		header('location:edit.php?id=<?php echo '['id'];'; ?>');

	}
?>