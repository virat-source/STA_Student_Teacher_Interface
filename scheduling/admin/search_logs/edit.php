<?php
	include('conn.php');
	$id=$_GET['id'];
	$query=mysqli_query($conn,"select * from `student_grades` where id='$id'");
	$row=mysqli_fetch_array($query);
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
<title>STA - Edit Log Info</title>
</head>
<body>
<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="../index.php" target="_blank">Source Trucking Academy</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Hourly Logs</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		
	<div class="modal-dialog">
		<div class="modal-content">
		<form method="POST" action="update.php">
				<div class="modal-header">
					<h3 class="modal-title">Edit Record</h3>
				</div>
				<div class="modal-body">
					

	
	<div class="form-group">
	

		<label>Name</label><br><input type="text" value="<?php echo $row['name']; ?>" name="name" id="name"><br></br>
		<label>Instructor</label><br><input type="text" value="<?php echo $row['instructor']; ?>" name="instructor" id="instructor"><br></br>
		<label>Subject</label><br><input type="text" value="<?php echo $row['subject']; ?>" name="subject" id="subject"><br></br>
		<label>Type</label><br><select value="<?php echo $row['training_type']; ?>" name="training_type" id="training_type"><br></br>
		<option>Behind the Wheel - Range</option>
		<option>Behind the Wheel - Public Roads</options>
        </select><br></br>
		<label>Grade</label><br><input type="number" min="0" max="10" value="<?php echo $row['grade']; ?>" name="grade" id="grade"><br></br>
		<label></label><input type="hidden" value="<?php echo $id; ?>" name="id" id="id">
		<label></label><input type="hidden" value="<?php echo $row['schedule']; ?>" name="schedule" id="schedule">
		<input type="submit" name="submit">
		<a href="index.php?id=<?php echo $row['schedule']; ?>">Back</a>
	</form>
</div></div>
  

</body>
</html>