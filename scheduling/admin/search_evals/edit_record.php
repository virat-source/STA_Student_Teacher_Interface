<?php


	require_once 'conn.php';
	
	$id=$_GET['id']; => $id=mysqli_real_escape_string($conn, $_GET['id']);



            $query1="SELECT * FROM student_grades WHERE id='$id'";

            $result1 = mysqli_query($conn,$query1) or die( "My query ($query1) generated an error: ".mysql_error());

            $data1=mysqli_fetch_array($result1);


?>