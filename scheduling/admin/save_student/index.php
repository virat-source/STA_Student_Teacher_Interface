<?php session_start(); 
if(!isset($_SESSION['login_id']))
    header('location:login.php');
 // include('./auth.php'); 
 ?>

<?php

	// Connect to database
	$con = mysqli_connect("localhost","root","","db_sta");
	
	// mysqli_connect("localhost","root","","db_sta")

	// Get all the categories from the courses table for student id query
	$sqlsid = "SELECT * FROM `courses`";
	$subj_id = mysqli_query($con,$sqlsid);
?>

<?php

?>
<!DOCTYPE html>
<html lang="en">



	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<?php

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
		<h3 class="text-primary">New Student</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add entry</button>
		<br /><br />
		<table class="table table-bordered">
			<thead class="alert-info">
				
	</div>
<div class="modal fade" id="form_modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="save_student.php">
				<div class="modal-header">
					<h3 class="modal-title">Add Student</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">

						<div class="form-group">
							<label>Last Name</label>
							<input id= "LASTNAME" type="text"  class="form-control" name="LASTNAME" autocomplete="off" required="required">							
						</div>

						<div class="form-group">
							<label>First Name</label>
							<input id= "FIRSTNAME" type="text"  class="form-control" name="FIRSTNAME" autocomplete="off" required="required">							
						</div>

						<div class="form-group">
							<label>Middle Name</label>
							<input id= "MIDDLENAME" type="text"  class="form-control" name="MIDDLENAME" autocomplete="off" >							
						</div>

						<div class="form-group">
							<label>Gender</label>
							<select id= "GENDER" class="form-control" name="GENDER" autocomplete="off" required="required">
								<option>Male</option>
								<option>Female</option>		
                            </select>					
						</div>

	
							<div class="form-group">
							<label>Enter Program Name:</label>
							<select id="PROGRAM" name="PROGRAM" autocomplete="off" required="required">
                            			<?php
				// use a while loop to fetch data
				// from the $first_name variable
				// and individually display as an option
				while ($courses = mysqli_fetch_array(
						$subj_id,MYSQLI_ASSOC)):;
			?>
				<option value="<?php echo $courses["id"];
					// The value we usually set is the primary key
				?>">
					<?php echo $courses["course"];
						// To show the student name to the user
					?>
				</option>
			<?php
				endwhile;
				// While loop must be terminated
			?>
		  </select>
                            <br></br>
						
						
	</div>
					</div>
				</div>
				<br style="clear:both;"/>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Close</button>
					<button class="btn btn-primary" id="save" name="save"><span class="glyphicon glyphicon-save"></span> save</button>
				</div>
			</form>
		</div>
	</div>
</div>	
<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>	
</body>	
</html>