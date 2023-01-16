<?php

	// Connect to database
	$con = mysqli_connect("localhost","root","","db_sta");

    $id=$_GET['id'];

	// mysqli_connect("localhost","root","","db_sta")

	// Get all the names from student_info table
	$sql = "SELECT CONCAT(FIRSTNAME , ' ' , MIDDLENAME , ' ' , LASTNAME) AS Name FROM `student_info`"; 
	$first_name = mysqli_query($con,$sql);

    // Get all the categories from student_info table for student id query
	$sqlsi = "SELECT * FROM `student_info`";
	$stud_id = mysqli_query($con,$sqlsi);

	// Get all the subjects from the subjects table for student id query
	$sqlsid = "SELECT * FROM `subjects`";
	$subj_id = mysqli_query($con,$sqlsid);

	// Get all the training types from the subjects table for student id query
	$sqlsit = "SELECT * FROM `subjects`";
	$trg_id = mysqli_query($con,$sqlsit);
?>

<?php

?>
<!DOCTYPE html>
<html lang="en">

<?php session_start(); ?>

	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<?php
  if(!isset($_SESSION['login_id']))
    header('location:login.php');
 // include('./auth.php'); 
 ?>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="https://www.sourcetruckingacademy.com/" target="_blank">Source Trucking Academy</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Hourly Inspection Logs</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		
		<br /><br />
		<table class="table table-bordered">
			<thead class="alert-info">
				<tr>
					<th>Name</th>
					<th>Subject</th>
					<th>Type</th>
					<th>Hours</th>
					<th>Final Score</th>
					<th>Pass/Fail</th>
					<th>Edit</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require 'conn.php';
					
					$query = mysqli_query($conn, "SELECT * FROM `student_grades` WHERE schedule='$id' AND NOT cat='Inspection'") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
					
					$final = ($fetch['grade']);
				?>
				<tr>
					<td><?php echo $fetch['name']?></td>
					<td><?php echo $fetch['subject']?></td>
					<td><?php echo $fetch['training_type']?></td>
					<td><?php echo $fetch['hours']?></td>
					<td><?php echo filter_var($final, FILTER_VALIDATE_INT) == false ? number_format($final,2) : number_format($final) ?></td>
					<?php
						if($final >=8){
							echo "<td style='background-color:green; color:#fff;'>Pass</td>";
						}else if($final < 8){
							echo "<td style='background-color:red; color:#fff;'>Fail</td>";
						}
					?>
					<td><a href="edit.php?id=<?php echo $fetch['id']; ?>">Edit</a></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>

</div>	
<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>	
</body>	
</html>