<?php


	$conn = mysqli_connect("localhost", "root", "", "db_sta");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){


$lrn=$_POST['lrn'];
$ln=$_POST['lname'];
$fn=$_POST['fname'];
$mn=$_POST['mname'];
$gender=$_POST['gender'];
$prog = $_POST['prog'];
$user = $_SESSION['ID'];
include 'db.php';

$search_query = mysqli_query($conn, "SELECT * FROM student_info WHERE LRN_NO = '$lrn'");
		$num_row = mysqli_num_rows($search_query);
		if($num_row >= 1){
			"<script>
			alert('LRN is not available.');
			 location.replace(document.referrer);
			</script>";
		}else{
			$sql = "INSERT INTO student_info
			 (
			 LRN_NO,
			 LASTNAME,
			 FIRSTNAME,
			 MIDDLENAME,
			 GENDER,
			 PROGRAM
			   )
		VALUES (
			'$lrn',
			'$ln',
			'$fn',
			'$mn',
			'$gender',
			'$prog'
		)";
		}
	
	}
mysqli_close($conn);

  ?>